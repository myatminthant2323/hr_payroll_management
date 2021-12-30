<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('user_id');
            $table->string('payment_month');
            $table->date('payment_date');
            $table->decimal('overtime_bonus',15,2)->nullable()->default(0);
            $table->decimal('leave_deduction',15,2)->nullable()->default(0);
            $table->decimal('attendance_bonus',15,2)->nullable()->default(0);
            $table->decimal('other_bonus',15,2)->nullable()->default(0);
            $table->decimal('attendance_deduction',15,2)->nullable()->default(0);
            $table->decimal('other_deduction',15,2)->nullable()->default(0);
            $table->decimal('total_bonus',15,2)->nullable()->default(0);
            $table->decimal('total_deduction',15,2)->nullable()->default(0);
            $table->decimal('net_pay',15,2)->nullable();
            $table->text('comment')->nullable();
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('payrolls');
    }
}
