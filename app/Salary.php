<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = [
        'employee_id', 'basic_salary', 'basic_working_time_per_day', 'overtime_rate', 'medical_allowance', 'transport_allowance', 'accomodation_allowance', 'leave_allowance', 'other_allowance', 'tds', 'esi', 'tax', 'other_deduction',
    ];

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }
}
