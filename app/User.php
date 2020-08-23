<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Musonza\Chat\Traits\Messageable;
use YoHang88\LetterAvatar\LetterAvatar;

class User extends Authenticatable
{
    use Notifiable,Messageable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'time_zone', 'role','step'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

//    public function posts()
//    {
//        return $this->hasMany(Post::class);
//    }
    public function tutorSchedules(){
        return $this->hasMany(Schedule::class, 'tutor_id');
    }
    public function studentSchedules(){
        return $this->hasMany(Schedule::class, 'student_id');
    }
    public function tutorInfo()
    {
        return $this->hasOne(TutorInfo::class);
    }

    public function studentInfo()
    {
        return $this->hasOne(StudentInfo::class);
    }

    public function credits()
    {
        return $this->hasOne(Credit::class);
    }

    public function availabilities()
    {
        return $this->hasMany(Availability::class);
    }

    public function getNameAttribute()
    {
        return $this->attributes['first_name'].' '.$this->attributes['last_name'];
    }

    public function getAvatarAttribute()
    {
        return new LetterAvatar($this->name);

    }
}
