<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeLeaveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_leave', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('emp_id');
            $table->unsignedBigInteger('leave_id');
            $table->date('from_date');
            $table->date('to_date');
            $table->integer('total_leave_day');
            $table->string('reason');
            $table->timestamps();

            $table->foreign('emp_id')
                  ->references('id')->on('employees')
                  ->onDelete('cascade'); 
                  
            $table->foreign('leave_id')
                  ->references('id')->on('leaves')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_leave');
    }
}
