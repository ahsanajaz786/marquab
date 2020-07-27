<?php

use App\Events\NotifyStudent;
use Carbon\Carbon;
use App\Jobs\NotifyStudentJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Artisan;


Route::get('test',function (){
    dd(route('notifications.lesson-schedule.post'));
    return view('test');
});
Route::get('google', function () {
    return view('googleAuth');
});
    
Route::get('google/login', 'Auth\LoginController@redirectToGoogle');
Route::get('google/callback', 'Auth\LoginController@handleGoogleCallback');
Route::get('facebook/callback', 'Auth\LoginController@handleFaceBookCallback');

Route::get('facebook/login', 'Auth\LoginController@redirectToFaceBook');



Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('registration.about');
});
Auth::routes();

Route::group(['middleware' => 'teacher', 'as' => 'tutor.'],function (){
    /* Registration */

    Route::group(["namespace"=>'Tutor', "prefix"=>"tutor"],function(){
        Route::get('/register','RegisterController@register')->name('register');
        Route::post('/register','RegisterController@registerPost')->name('post');
    });

    /* Registration end */

    Route::get('/availability', 'AvailabilityController@index')->name('availability');
    Route::post('/availability', 'AvailabilityController@store')->name('availability.post');
    Route::delete('/availability/{id}', 'AvailabilityController@destroy')->name('availability.destroy');
    Route::get('requests', 'ChatController@index')->name('request.index');

    /* Availability settings in settings page */
    Route::post('availability/settings', 'SettingController@availabilitySettingsPost')->name('availabilty-settings.post');

    Route::put('availability/settings/{id}', 'SettingController@availabilitySettingsUpdate')->name('availabilty-settings.update');
});


Route::group(['middleware' => 'auth'],function (){

    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('calendar','CalendarController');
    Route::post('/updateSchedule','CalendarController@update');
    Route::post('/cancelSchedule','CalendarController@cancelSchedule');
    

    Route::get('/profile', 'SettingController@profile')->name('profile.index');
    Route::get('/settings', 'SettingController@settings')->name('settings.index');
    Route::post('/settings/card-payment', 'SettingController@addCardPayment')->name('settings.card-payment.post');
    Route::post('/settings', 'SettingController@passwordChange')->name('password-change.post');
    Route::post('/profile/about', 'SettingController@aboutUpdate')->name('about.update');
    Route::post('/profile/photo', 'SettingController@photoUpdate')->name('photo.update');
    Route::post('/profile/description', 'SettingController@descriptionUpdate')->name('description.update');
    Route::post('/profile/video', 'SettingController@videoUpdate')->name('video.update');
    Route::resource('notification-settings','NotificationSettingController');

    /* Lesson Booking */
    Route::post('find-tutor/book-trial-lesson/{id}', 'FindTutorController@storeTrialLesson')->name('find-tutor.trial.store');
    Route::post('find-tutor/book-regular-lesson/{id}', 'FindTutorController@storeRegularLesson')->name('find-tutor.regular.store');
    /* Lesson Booking */

    /* Notificaitons */
    Route::post('notifications/lesson-schedule', 'NotificationsController@lessonSchedule')->name('notifications.lesson-schedule.post');
    Route::post('notifications/price-change', 'NotificationsController@priceChanged')->name('notifications.price-change.post');
    Route::get('notifications', 'NotificationsController@index')->name('notifications.index');
    /* Notificaitons */

    /* Chat Module */

    Route::get('messages', 'MessageController@index')->name('messages.index');

    Route::get('message/{id}', 'MessageController@chatHistory')->name('message.read');

    Route::group(['prefix'=>'ajax', 'as'=>'ajax::'], function() {
        Route::post('message/send', 'MessageController@ajaxSendMessage')->name('message.new');
        Route::delete('message/delete/{id}', 'MessageController@ajaxDeleteMessage')->name('message.delete');
    });

    /* Chat Module */

    /* Paypal */

    Route::post('paypal/pay','PaypalController@addPayment')->name('paypalPay.post');
    Route::get('paypal/status','PaypalController@getStatus')->name('paypalStatus.get');

    /* Paypal End */

    /* Lessons */
    Route::get('lessons', 'LessonController@index')->name('lesson.index');

    Route::group(['middleware' => 'teacher'],function () {
        Route::get('lesson/reschedule/{id}', 'LessonController@reSchedule')->name('lesson.reschedule.index');
        Route::post('lesson/reschedule/{id}', 'LessonController@reSchedulePost')->name('lesson.reschedule.post');
        Route::post('lesson/price-change/{id}', 'LessonController@changePrice')->name('lesson.price-change.post');

    });
    /* Lessons End*/

    //tutor background routes

    Route::group(['middleware' => 'teacher', 'as' => 'background.'],function () {

        Route::post('background/update-background/{type}', 'Tutor\TutorBackgroundController@updateBackground')->name('update-background');

    });

    //tutor background routes

    /* Cache Clear */

    Route::get('cache-clear', function (){
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        abort(404);
    });
});

Route::get('find-tutor', 'FindTutorController@index')->name('find-tutor.index');
Route::get('find-tutor/{id}', 'FindTutorController@show')->name('find-tutor.show');


Broadcast::routes();

Route::get('/job',function(){
    $notifyJob = (new NotifyStudentJob())->delay(Carbon::now()->addSeconds(60));
    dispatch($notifyJob);
    echo 'email sent';
});
Route::get('c',function(){
    $event = App\Shedule::where('id',535)->first();
    $diff = strtotime($event->start) - strtotime($event->end);
    return $diff;

});
