<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->date('leave_date');
            $table->integer('total_leave_day');
            $table->string('reason');
            $table->integer('status');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();

            $table->foreign('employee_id')
                  ->references('id')->on('employees')
                  ->onDelete('cascade');

              $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leaves');
    }
}
