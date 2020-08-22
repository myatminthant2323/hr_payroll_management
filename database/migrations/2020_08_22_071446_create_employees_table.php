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
            $table->string('emp_name')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('address')->nullable();
            $table->string('phno')->nullable();
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('designation_id');
            $table->dateTime('join_date')->nullable();
            $table->decimal('basic_salary')->nullable();
            $table->time('basic_working_time_per_day')->nullable();
            $table->decimal('medical_allowance');
            $table->decimal('transport_allowance');
            $table->decimal('accomodation_allowance');
            $table->integer('leave_allowance_per_year');
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
