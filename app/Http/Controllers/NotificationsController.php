<?php

namespace App\Http\Controllers;

use App\Notifications\LessonScheduleNotification;
use App\Schedule;
use App\User;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function index(){
        $lessonScheduleNotifications = auth()->user()->unreadNotifications->where('type','App\Notifications\LessonScheduleNotification');
        return view('notifications',compact('lessonScheduleNotifications'));
    }

    public function priceChanged(Request $request){
        $notification = auth()->user()->notifications()->find($request->notification_id);
        if($notification){
            $notification->markAsRead();
            $user = User::find($notification->data['user_id']);
            $schedule = Schedule::find($notification->data['schedule_id']);
            $data = $notification->data;
            if($schedule->student_id != auth()->user()->id || $schedule->status != 'Not Confirmed'){
                return redirect()->back()->withErrors(['Something went wrong']);
            }
            if($schedule){
                if($request->confirm){
                    $schedule->status = 'Confirmed';
                    $schedule->price = $data['price'];
                    $data['status'] = 'Confirmed';
                }
                else{
                    $schedule->status = 'Decline';
                    $data['status'] = 'Decline';
                }
                $schedule->save();
            }
            if($user){
                $data['user_name'] = auth()->user()->name;
                $data['user_id'] = auth()->user()->id;
                $user->notify(new LessonScheduleNotification($data));
            }
        }
        return redirect()->back();
    }

    public function lessonSchedule(Request $request){
        $notification = auth()->user()->notifications()->find($request->notification_id);
        if($notification){
            $notification->markAsRead();
            if($request->mark_as_read){
                return redirect()->back();
            }
            $user = User::find($notification->data['user_id']);
            $schedule = Schedule::find($notification->data['schedule_id']);
            $data = $notification->data;
            if($schedule){
                if($request->confirm)
                    $schedule->status = 'Confirmed';
                else
                    $schedule->status = 'Decline';
                $schedule->save();
            }
            if($request->confirm)
                $data['status'] = 'Confirmed';
            else
                $data['status'] = 'Decline';
            if($user){
                $data['user_name'] = auth()->user()->first_name.' '.auth()->user()->last_name;
                $data['user_id'] = auth()->user()->id;
                $user->notify(new LessonScheduleNotification($data));
            }
        }
        return redirect()->back();
    }
}
