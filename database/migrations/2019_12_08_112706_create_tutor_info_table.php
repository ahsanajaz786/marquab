<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutorInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutors_info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('language_spoken');
            $table->longText('language_spoken_lavel');
            $table->longText('subject_taught');
            $table->string('hourly_rate');
            $table->string('profile_photo')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('headline');
            $table->longText('about');
            $table->string('country');
            $table->string('recorded_video')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('user_id');
            $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tutors_info');
    }
}
