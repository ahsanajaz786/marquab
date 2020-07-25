<?php

namespace App\Http\Controllers;

use App\Notifications\LessonScheduleNotification;
use App\Schedule;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    public function index(){
        $schedules = [];
        if(auth()->user()->role == 'Teacher')
            $schedules = Schedule::where('tutor_id', auth()->user()->id)
                ->where('status','!=','Decline')
                ->whereNotNull('student_id')
                ->with('student')->get();
        else
            $schedules = Schedule::where('student_id', auth()->user()->id)->where('status','!=','Decline')->with('tutor')->get();
        return view('lesson.index')->withSchedules($schedules);
    }
    public function changePrice(Request $request, $id){
        $request->validate(['price' => 'required']);
        if(auth()->user()->role != 'Teacher')
            return redirect()->back()->withErrors('Unauthorized');
        $schedule = Schedule::find($id);
        if(!$schedule || ($schedule->status != 'Pending' && $schedule->status != 'Confirmed'))
            return redirect()->back()->withErrors('Invalid Information');
        $schedule->status = 'Not Confirmed';
        $schedule->save();
        $data = [
            'message' => 'Lesson Price Changed',
            'user_name' => auth()->user()->name,
            'status' => 'Not Confirmed',
            'type' => 'priceChanged',
            'price' => $request->price,
            'subject' => $schedule->subject,
            'from' =>  Carbon::parse($schedule->start, auth()->user()->time_zone)->setTimezone('UTC'),
            'to' => Carbon::parse($schedule->end, auth()->user()->time_zone)->setTimezone('UTC'),
            'schedule_id' => $schedule->id,
            'user_id' => auth()->user()->id,
        ];
        User::find($schedule->student_id)->notify(new LessonScheduleNotification($data));
        return redirect()->back()->withSuccess('Price will be changed after confirmation');

    }
    public function reSchedule($id){
        if(auth()->user()->role != 'Teacher')
            abort(404);
        return view('lesson.reschedule')->withId($id);
    }
    public function reSchedulePost(Request $request, $id){
        if(auth()->user()->role != 'Teacher')
            abort(404);
        $request->validate([
            'schedule_date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);
        $schedule = Schedule::find($id);
        if($schedule->status == 'Decline'){
            return redirect()->back()->withErrors('Lesson already declined');
        }
        $start = Carbon::parse($request->schedule_date.' '.$request->start_time, auth()->user()->time_zone)->setTimezone('UTC');
        $end = Carbon::parse($request->schedule_date.' '.$request->end_time, auth()->user()->time_zone)->setTimezone('UTC');
        $trailLesson = Schedule::where('tutor_id', auth()->user()->id)
            ->where('start','<=', $start)
            ->where('end','>=', $start)
            ->first();
        if($trailLesson)
            return redirect()->back()->withErrors('Lesson already exists');
        $schedule->update(['status' => 'Decline']);
        $event = Schedule::create([
            'type' => 'Regular Lesson',
            'subject' => $schedule->subject,
            'status' => 'Not Confirmed',
            'start' => $start,
            'end'   => $end,
            'student_id' => $schedule->student_id,
            'tutor_id' => Auth::user()->id,
        ]);
        $data = [
            'message' => 'Lesson Rescheduled',
            'user_name' => auth()->user()->name,
            'status' => 'Not Confirmed',
            'type' => 'reschedule',
            'subject' => $schedule->subject,
            'from' => $start,
            'to' => Carbon::parse($request->schedule_date.' '.$request->end_time, auth()->user()->time_zone)->setTimezone('UTC'),
            'schedule_id' => $event->id,
            'user_id' => auth()->user()->id,
        ];
        User::find($schedule->student_id)->notify(new LessonScheduleNotification($data));
        return redirect()->back()->withSuccess('Lesson will be schedule after confirmation');

    }
}
