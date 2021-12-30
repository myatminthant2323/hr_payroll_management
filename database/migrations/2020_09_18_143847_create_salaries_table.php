<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id')->unique();
            $table->unsignedBigInteger('user_id');
            $table->decimal('basic_salary',15,2);
            $table->integer('basic_working_time_per_day');
            $table->decimal('medical_allowance',15,2)->nullable()->default(0);
            $table->decimal('transport_allowance',15,2)->nullable()->default(0);
            $table->decimal('accomodation_allowance',15,2)->nullable()->default(0);
            $table->decimal('other_allowance',15,2)->nullable()->default(0);
            $table->integer('leave_allowance')->nullable()->default(0);
            $table->decimal('epf',5,2)->nullable()->default(0);
            $table->decimal('esi',5,2)->nullable()->default(0);
            $table->decimal('other_insurance',15,2)->nullable()->default(0);
            $table->decimal('other_deduction',15,2)->nullable()->default(0);
            $table->decimal('gross_salary',15,2)->nullable()->default(0);
            $table->decimal('total_deduction',15,2)->nullable()->default(0);
            $table->decimal('net_salary',15,2)->nullable()->default(0);
            $table->timestamps();

            $table->foreign('employee_id')
                  ->references('id')
                  ->on('employees')
                  ->onDelete('cascade');

            $table->foreign('user_id')  
                    ->references('id')
                    ->on('users')
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
        Schema::dropIfExists('salaries');
    }
}
