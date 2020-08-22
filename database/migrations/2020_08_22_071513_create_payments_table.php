<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('user_id');
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->integer('total_days')->nullable();
            $table->time('total_overtime_hour');
            $table->decimal('overtime_rate');
            $table->decimal('overtime_amount');
            $table->decimal('bonus');
            $table->dateTime('payment_date');
            $table->string('payment_mode');
            $table->decimal('netpay');
            $table->timestamps();

            $table->foreign('employee_id')
                  ->references('id')->on('employees')
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
        Schema::dropIfExists('payments');
    }
}
