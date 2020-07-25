<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAvailabilitySettings extends Model
{
    protected $fillable = ['user_id', 'min_time_booking', 'max_time_booking'];
}
