<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'employee_id', 'from_date', 'to_date', 'total_days', 'total_overtime_hour', 'overtime_rate', 'overtime_amount', 'bonus', 'payment_date', 'payment_mode', 'netpay',
    ];

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }
}
