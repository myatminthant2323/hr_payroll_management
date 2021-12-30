<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOvertimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('overtimes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->date('overtime_date');
            $table->integer('overtime_hour');
            $table->decimal('overtime_rate',2, 1);
            $table->text('description')->nullable();
            $table->integer('status');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();

            $table->foreign('employee_id')
            ->references('id')->on('employees')
            ->onDelete('cascade');

            $table->foreign('user_id')  
            ->references('id')->on('users')
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
        Schema::dropIfExists('overtimes');
    }
}
