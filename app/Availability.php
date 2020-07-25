<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Availability extends Model
{
    protected $fillable = ['start', 'end'];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

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
            return $this->attributes['start'] = Carbon::parse($date, 'UTC');
        return $this->attributes['start'] = Carbon::parse($date, 'UTC')->setTimezone(Auth::user()->time_zone);
    }

    public function getEndAttribute($date)
    {
        if(!Auth::check())
            return $this->attributes['end'] = Carbon::parse($date, 'UTC');
        return $this->attributes['end'] = Carbon::parse($date, 'UTC')->setTimezone(Auth::user()->time_zone);
    }
}
