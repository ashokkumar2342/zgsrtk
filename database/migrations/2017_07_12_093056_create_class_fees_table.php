<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_fees', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('class_id');
            $table->unsignedInteger('session_id');
            $table->integer('admission_fee');
            $table->integer('registration_fee');
            $table->integer('annual_fee');
            $table->integer('bus_fee');
            $table->integer('caution_fee');
            $table->integer('activity_charge');
            $table->integer('smart_fee');
            $table->integer('tution_fee');
            $table->integer('other_fee');
            $table->softDeletes();
            $table->timestamps();
            $table->boolean('status')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_fees');
    }
}
