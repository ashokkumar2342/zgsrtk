<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('home_works', function (Blueprint $table) {
            $table->increments('id');            
            $table->unsignedInteger('center_id');
            $table->unsignedInteger('session_id');
            $table->unsignedInteger('class_id');
            $table->unsignedInteger('section_id');
            $table->text('homework');
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
       Schema::dropIfExists('home_works');
    }
}
