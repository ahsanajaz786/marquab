<?php

namespace App\Http\Controllers;

use App\Availability;
use App\Credit;
use App\Notifications\LessonScheduleNotification;
use App\Schedule;
use App\TutorInfo;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use function foo\func;

class FindTutorController extends Controller
{
    public function index(Request $request){
        if($request->all()){
            $whereArray = [];

            if($request->tutor_teaches)
                array_push($whereArray,['subject_taught','LIKE', '%'.$request->tutor_teaches.'%']);
            if($request->price_per_hour)
                array_push($whereArray,['hourly_rate','<=', (int) $request->price_per_hour]);
            $start = false;
            $end = false;
            if($request->tutor_available && $request->tutor_available != 'any-time'){
                $time = explode('-',$request->tutor_available);
                $start = Carbon::parse($time[0].':00',auth()->user()->time_zone)->setTimezone('UTC');
                $end = Carbon::parse($time[1].':00',auth()->user()->time_zone)->setTimezone('UTC');
            }
            $users = User::whereHas('tutorInfo', function($q) use ($whereArray){
                $q->where($whereArray);
            })->whereHas('availabilities', function($q) use ($start, $end){
                if($start && $end){
                    $q->whereTime('start', '<=', $start);
                    $q->whereTime('end', '>=', $end);
                }
            });
            if(Auth::check()){
                $users->where('id','!=',auth()->user()->id);
            }
            $users = $users->with('availabilities')->with('tutorInfo')->get();
            foreach ($users as $key => $user){
                $video = '';
                if($user->tutorInfo->youtube_url){
                    $video = $this->getIframe($user->tutorInfo->youtube_url);
                }elseif(Storage::disk('users')->exists($user->id.'/recorded-video.webm')){
                    $url = url(Storage::disk('users')->url($user->id.'/recorded-video.webm'));
                    $video = '<video src="'.$url.'" controls width="500"></video>';
                }
                $users[$key]['video'] = $video;
            }
            return view('find-tutor')->withUsers($users)->withSearchParams($request->all());
        }

        $users = User::whereHas('tutorInfo', function($q){
            $q->where([
                ['hourly_rate', '<=', 10],
                ['subject_taught', 'LIKE', '%Physics%'],
            ]);
        });
        if(Auth::check()){
            $users->where('id','!=',auth()->user()->id);
        }
        $users = $users->get();
        $params = [
            'tutor_teaches' => 'Physics',
            'price_per_hour' => '10',
            'tutor_available' => 'any-time',
        ];
        return view('find-tutor')->withUsers($users)->withSearchParams($params);
    }

    public function show($id){
        $user = User::find($id);
        $info = $user->tutorInfo;
        $available = $user->availabilities;
        //dd($available[0]->start->format('H:m'));
        $dayOfWeeks = [
            '09' => 0,
            '10' => 1,
            '11' => 2,
            '12' => 3,
            '13' => 4,
            '14' => 5,
            '15' => 6,
        ];
        $subjects = [];
        $subjectTaught = json_decode($info->subject_taught);
        if(count($subjectTaught) > 0)
            $subjects = $subjectTaught;
        $video = '';
        if($info->youtube_url){
            $video = $this->getIframe($info->youtube_url);
        }elseif(Storage::disk('users')->exists($user->id.'/recorded-video.webm')){
            $url = url(Storage::disk('users')->url($user->id.'/recorded-video.webm'));
            $video = '<video src="'.$url.'" controls width="500"></video>';
        }
        return view('tutor-profile',compact('user','info','video','available','dayOfWeeks','subjects'));
    }

    public function storeTrialLesson(Request $request, $id){
        $utcStart = Carbon::parse($request->start, auth()->user()->time_zone)->setTimezone('UTC');
        $trailLesson = Schedule::where('student_id', auth()->user()->id)
                        ->where('tutor_id',$id)
                        ->where('status', 'Confirmed')
                        ->whereOr('status', 'Not Confirmed')
                        ->where('type', 'Trial Lesson')->first();
        if($trailLesson)
            return response(['error' => 'Lesson already exists'],200);
        $event = Schedule::create([
            'type' => 'Trial Lesson',
            'subject' => $request->subject,
            'status' => 'Not Confirmed',
            'start' => $request->start,
            'end'   => $request->end,
            'student_id' => Auth::user()->id,
            'tutor_id' => $id,
        ]);
        $data = [
            'message' => 'Lesson Schedule',
            'user_name' => auth()->user()->first_name.' '.auth()->user()->last_name,
            'status' => 'Not Confirmed',
            'from' => Carbon::parse($request->start, auth()->user()->time_zone)->setTimezone('UTC'),
            'to' => Carbon::parse($request->end, auth()->user()->time_zone)->addDays(2)->setTimezone('UTC'),
            'schedule_id' => $event->id,
            'user_id' => auth()->user()->id,
        ];
        User::find($id)->notify(new LessonScheduleNotification($data));
        return response(['success' => 'Lesson Scheduled'],200);
    }

    public function storeRegularLesson(Request $request, $id){
        $utcStart = Carbon::parse($request->start, auth()->user()->time_zone)->setTimezone('UTC');
        $utcEnd = Carbon::parse($request->end, auth()->user()->time_zone)->setTimezone('UTC');
        $diff = $utcEnd->diffInMinutes($utcStart, true);
        $diff = $diff / 60;
        $tutor = User::find($id);
        $user = auth()->user();
        $hourlyRate = $tutor->tutorInfo->hourly_rate;
        $totalLessonPrice = $hourlyRate * $diff;
        $userCredits = Credit::where('user_id',$user->id)->first();
        $tutorCredits = Credit::where('user_id',$tutor->id)->first();
        $userOldCredit = $userCredits->credit;
        $tutorOldCredit = $tutorCredits->credit;
        if($userOldCredit < $totalLessonPrice)
            return response(['error' => 'You dont have enough credit to get this lesson'],200);
        $trailLesson = Schedule::where('student_id', auth()->user()->id)
            ->where('tutor_id', $id)
            ->where('start','<=', $utcStart)
            ->where('end','>=', $utcStart)
            ->first();
        if($trailLesson)
            return response(['error' => 'Lesson already exists'],200);
        try {
            $event = Schedule::create([
                'type' => 'Regular Lesson',
                'subject' => $request->subject,
                'status' => 'Not Confirmed',
                'start' => $request->start,
                'end'   => $request->end,
                'student_id' => Auth::user()->id,
                'tutor_id' => $id,
            ]);
            $userCredits->credit -= $totalLessonPrice;
            $userCredits->save();
            $tutorCredits->credit += $totalLessonPrice;
            $tutorCredits->save();
            $data = [
                'message' => 'Lesson Schedule',
                'user_name' => auth()->user()->first_name.' '.auth()->user()->last_name,
                'status' => 'Not Confirmed',
                'subject' => $event->subject,
                'from' => Carbon::parse($request->start, auth()->user()->time_zone)->setTimezone('UTC'),
                'to' => Carbon::parse($request->end, auth()->user()->time_zone)->addDays(2)->setTimezone('UTC'),
                'schedule_id' => $event->id,
                'user_id' => auth()->user()->id,
            ];
            User::find($id)->notify(new LessonScheduleNotification($data));
        }catch (\ErrorException $e){
            if(isset($event->id))
                Schedule::find($event->id)->delete();
            $userCredits->credit = $userOldCredit;
            $userCredits->save();
            $tutorCredits->credit = $tutorOldCredit;
            $tutorCredits->save();
            return response(['error' => 'unable to schedule'],200);
        }
        return response(['success' => 'Lesson Scheduled'],200);
    }

    private function getIframe($url){
        $id= '';
        $iframe = '';
        if(strpos($url,'youtu')) {
            if (strpos($url, 'https://youtu.be/')) {
                $id = explode('https://youtu.be/', $url)[1];
            } elseif(strpos($url, 'embed')){
                $id = explode('https://www.youtube.com/embed/', $url)[1];
            }elseif (strpos($url, '=')) {
                $id = explode('=', $url)[1];
            }
            if($id){
                $iframe = '<iframe width="560" height="315" src="//www.youtube.com/embed/'
                    . $id . '" frameborder="0" allowfullscreen></iframe>';
                return $iframe;
            }
        }
        return false;
    }


}
