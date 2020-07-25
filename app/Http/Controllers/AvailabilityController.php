<?php

namespace App\Http\Controllers;

use App\Availability;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;

class AvailabilityController extends Controller
{
    public function index(){
        $events = Availability::where('user_id',auth()->user()->id)->get();
        return view('tutor.availability')->withEvents($events);
    }
    public function store(Request $request){
//        dd(Carbon::parse($request->start)->setTimezone('UTC'));
//        dd();
        $shedule = new Availability;
        $shedule->user_id = Auth::user()->id;
        $shedule->start = $request->start;
        $shedule->end = $request->end;
        $shedule->save();
        return response()->json(['success' => $shedule]);
    }
    public function destroy($id){
        $event = Availability::where('user_id', auth()->user()->id)
            ->where('id',$id)
            ->first();
        $event->delete();
        return response(['success' => 'delete'],200);
    }
}
