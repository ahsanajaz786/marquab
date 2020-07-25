<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Schedule extends Model
{
    protected $fillable = ['student_id','tutor_id','type','subject','student_name','status','is_archive','price','title','comment','start','end'];

    public function student(){
        return $this->belongsTo(User::class, 'student_id');
    }
    public function tutor(){
        return $this->belongsTo(User::class, 'tutor_id');
    }
    public function setStartAttribute($date)
    {
        $this->attributes['start'] = Carbon::parse($date, Auth::user()->time_zone)->setTimezone('UTC');
    }

    public function setEndAttribute($date)
    {
        $this->attributes['end'] = Carbon::parse($date, Auth::user()->time_zone)->setTimezone('UTC');
    }

    public function getStartAttribute($date)
    {
        if(!Auth::check())
            return $this->attributes['start'] = $date;
        return $this->attributes['start'] = Carbon::parse($date, 'UTC')->setTimezone(Auth::user()->time_zone);
    }

    public function getEndAttribute($date)
    {
        if(!Auth::check())
            return $this->attributes['end'] = $date;
        return $this->attributes['end'] = Carbon::parse($date, 'UTC')->setTimezone(Auth::user()->time_zone);
    }

}
