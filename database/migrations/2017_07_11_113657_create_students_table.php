<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('username')->unique();
            $table->string('password');
            $table->unsignedInteger('center_id');
            $table->unsignedInteger('session_id');
            $table->unsignedInteger('class_id');
            $table->unsignedInteger('section_id');
            $table->integer('totalFee');
            $table->date('date_of_admission');
            $table->string('father_name');
            $table->string('mother_name');
            $table->date('dob');
            $table->string('religion');
            $table->string('category');
            $table->text('address');
            $table->string('state');
            $table->string('city');
            $table->integer('pincode');
            $table->string('mobile_one')->nullable();
            $table->string('mobile_two')->nullable();
            $table->string('mobile_sms');
            $table->string('picture')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
            $table->boolean('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
