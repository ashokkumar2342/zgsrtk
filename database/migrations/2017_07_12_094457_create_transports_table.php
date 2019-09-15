<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('center_id');
            $table->string('driver_name');
            $table->string('driver_contact');
            $table->string('vehical_no');
            $table->string('bus_name');
            $table->string('first_stoppage');
            $table->string('last_stoppage');
            $table->string('bus_starting_time');
            $table->string('bus_arrival_time');
            $table->text('bus_terminal');
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
        Schema::dropIfExists('transports');
    }
}
