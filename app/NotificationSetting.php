<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificationSetting extends Model
{
    protected $fillable = ['user_id', 'email_notifications', 'sms_notifications','insights'];
}
