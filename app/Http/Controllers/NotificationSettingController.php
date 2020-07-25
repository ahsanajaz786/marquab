<?php

namespace App\Http\Controllers;

use App\NotificationSetting;
use Illuminate\Http\Request;

class NotificationSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        if($request->email_notifications || $request->sms_notifications || $request->insights){

            $notification = NotificationSetting::where('user_id', auth()->user()->id)->first();
            if(!$notification)
                $notification = new NotificationSetting();
            if($request->email_notifications)
                $notification->email_notifications = json_encode($request->email_notifications);
            if($request->sms_notifications)
                $notification->sms_notifications = json_encode($request->sms_notifications);
            if($request->insights)
                $notification->insights = json_encode($request->insights);
            $notification->user_id = auth()->user()->id;
            $notification->save();
        }
        return redirect()->back()->withSuccess('Record Updated');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
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
        //
    }
}
