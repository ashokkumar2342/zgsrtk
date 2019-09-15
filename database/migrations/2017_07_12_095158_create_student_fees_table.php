<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_fees', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('student_id');
            $table->string('total_fees');
            $table->string('installment_fees');
            $table->string('discount_type');
            $table->string('discount_name');
            $table->string('discount');
            $table->string('receipt_no');
            $table->string('receipt_date');
            $table->string('amount_payable');
            $table->string('balance_fees');
            $table->string('cheque_no');
            $table->string('bank_name');
            $table->string('cheque_date');
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
        Schema::dropIfExists('student_fees');
    }
}
