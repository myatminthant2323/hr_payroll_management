<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('emp_name');
            $table->string('email')->unique();
            $table->string('address');
            $table->string('phno1');
            $table->string('phno2')->nullable();
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('designation_id');
            $table->dateTime('join_date');
            $table->decimal('basic_salary');
            $table->time('basic_working_time_per_day');
            $table->decimal('medical_allowance')->nullable();
            $table->decimal('transport_allowance')->nullable();
            $table->decimal('accomodation_allowance')->nullable();
            $table->integer('leave_allowance_per_year')->nullable();
            $table->timestamps();

            $table->foreign('department_id')
                  ->references('id')->on('departments')
                  ->onDelete('cascade');

            $table->foreign('designation_id')
                  ->references('id')->on('designations')
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
        Schema::dropIfExists('employees');
    }
}
