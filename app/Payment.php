<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'employee_id', 'user_id', 'from_date', 'to_date', 'total_days','basic_salary', 'total_overtime_hour', 'overtime_rate', 'overtime_amount', 'medical_allowance', 'transport_allowance', 'accomodation_allowance', 'bonus', 'other_allowance', 'tds', 'esi', 'loan', 'leave', 'other_deductions', 'payment_date', 'payment_mode', 'netpay',
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
