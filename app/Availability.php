<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Availability extends Model
{
    protected $fillable = ['day', 'start_time','end_time'];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    
}
