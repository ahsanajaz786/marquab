<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentInfo extends Model
{
    protected $table = 'student_info';
    protected $fillable = ['profile_photo','user_id','phone_no','skype_id'];
}
