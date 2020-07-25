<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TutorInfo extends Model
{
    protected $table = 'tutors_info';
    protected $fillable = ['language_spoken','language_spoken_lavel','subject_taught', 'country','hourly_rate','profile_photo', 'phone_number', 'headline','about','recorded_video','youtube_url','user_id'];
}
