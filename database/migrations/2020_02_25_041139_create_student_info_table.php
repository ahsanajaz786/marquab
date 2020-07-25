<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('profile_photo')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('country')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('skype_id')->nullable();
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
        Schema::dropIfExists('student_info');
    }
}
