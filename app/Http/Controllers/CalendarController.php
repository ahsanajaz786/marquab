<?php

namespace App\Http\Controllers;

use App\Notifications\LessonScheduleNotification;
use App\Schedule;
use App\Shedule;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\TutorInfo;
use Illuminate\Support\Facades\Auth;

use function Symfony\Component\VarDumper\Dumper\esc;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $user_type='';
        if(Auth::user()->role=='Teacher')
        {
            $user_type='tutor_id';
        }else{

            $user_type='student_id';
        }
        $events = Schedule::where($user_type,Auth::user()->id)->get();

        $students = $events->groupBy('student_id');
        $subjects=[];
        if(Auth::user()->role=='Teacher')
        {
            $subjects = TutorInfo::select('subject_taught')->where('user_id',Auth::user()->id)->get();

        }
        
        
        return view('tutor.calendar', compact('events', 'students', 'subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'type'        => 'required|string',
            'start' => 'required',
            'end' => 'required'
        ]);
        if($request->type !== 'Time Off'){
            $request->validate([
                'student_id'        => 'required',
                'subject'        => 'required',
            ]);
            $studentExists = Schedule::where('tutor_id', auth()->user()->id)->where('student_id', $request->student_id)->first();
            if(!$studentExists)
                return response(['error' => 'Unauthorized action'],500);
            $event = Schedule::create([
                'student_id' => $request->student_id,
                'type' => $request->type,
                'subject' => $request->subject,
                'status' => 'Not confirmed',
                'start' => $request->start,
                'end'   => $request->end,
                'tutor_id' => Auth::user()->id,
            ]);

            $data = [
                'message' => 'Lesson Rescheduled',
                'user_name' => auth()->user()->name,
                'status' => 'Not Confirmed',
                'type' => 'reschedule',
                'subject' => $event->subject,
                'from' => Carbon::parse($request->start, auth()->user()->time_zone)->setTimezone('UTC'),
                'to' => Carbon::parse($request->end, auth()->user()->time_zone)->setTimezone('UTC'),
                'schedule_id' => $event->id,
                'user_id' => auth()->user()->id,
            ];
            User::find($event->student_id)->notify(new LessonScheduleNotification($data));
            $event->student_name = $event->student->name;
            return response($event,200);
        }else{
            $event = Schedule::create([
                'type' => $request->type,
                'title' => $request->title,
                'comment' => $request->comment,
                'status' => 'Confirmed',
                'start' => $request->start,
                'end'   => $request->end,
                'tutor_id' => Auth::user()->id,
            ]);
            return response($event,200);
        }
        return response(['error' => 'unable to add'],500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancelSchedule(Request $request)
    {
        $event=Schedule::find($request->id);
        $event->status='cancel';
        $event->save();
        return response($event,200);


        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function diffDates($eventDate)
    {
        
        if( $eventDate>date("Y-m-d H:i:s")){
            return true;

        }  else{
            return false;
        }
        

          
    }
    public function update(Request $request)
    {
        
        $event=Schedule::find($request->id);
        
        if(auth()->user()->role=='Teacher'|| auth()->user()->role=='Student' && $this->diffDates($event->start)  )
        {
            $event->start=$request->start;
            $event->end=$request->end;
            $event->save();
            return response($event,200);
            
        }
        return response(['error' => 'unable to Save'],500);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Schedule::where('tutor_id', auth()->user()->id)
            ->where('id',$id)
            ->first();
        $event->delete();
        return response(['success' => 'delete'],200);
    }
}
