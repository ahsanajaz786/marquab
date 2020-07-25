<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Post extends Model
{
    use HasLocalDates;
    protected $fillable = ['user_id', 'title', 'description', 'dat', 'created_at'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function setDatAttribute($date)
    {
        $this->attributes['dat'] = Carbon::parse($date)->setTimezone('UTC');
        // $this->attributes['dat'] = date('Y-m-d H:i:s');
    }
    public function getDatAttribute($date)
    {
        return $this->attributes['dat'] = Carbon::parse($date, 'UTC')->setTimezone(Auth::user()->tz);
    }
    public function setCreatedAtAttribute($date)
    {
        // date('Y-m-d H:i:s');
        $this->attributes['created_at'] = Carbon::parse($date)->setTimezone('UTC');
    }
    public function getCreatedAtAttribute($date)
    {
        return $this->attributes['created_at'] = Carbon::parse($date, 'UTC')->setTimezone(Auth::user()->tz);
    }
    protected $dates = [
        'created_at',
        'updated_at',
        'dat'
    ];
}