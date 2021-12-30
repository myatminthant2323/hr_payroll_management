<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    protected $fillable = [
        'employee_id', 'user_id', 'payment_month', 'payment_date', 'overtime_bonus', 'leave_deduction','attendance_bonus', 'other_bonus', 'attendance_deduction', 'other_deduction', 'total_bonus', 'other_deduction', 'net_pay', 'comment', 'status',
    ];

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
