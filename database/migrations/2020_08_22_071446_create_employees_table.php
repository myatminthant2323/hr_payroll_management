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
            $table->unsignedBigInteger('user_id');
            $table->text('photo');
            $table->string('fname');
            $table->string('lname');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('address');
            $table->string('phno1');
            $table->string('phno2')->nullable();
            $table->date('date_of_birth');
            $table->string('gender');
            $table->string('martial_status');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('designation_id');
            $table->date('join_date');
            $table->timestamps();

            $table->foreign('department_id')
                  ->references('id')->on('departments')
                  ->onDelete('cascade');

            $table->foreign('designation_id')
                  ->references('id')->on('designations')
                  ->onDelete('cascade');

            $table->foreign('user_id')
                  ->references('id')->on('users')
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
