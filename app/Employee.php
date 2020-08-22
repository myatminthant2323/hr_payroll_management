<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'emp_name', 'email', 'address', 'phno', 'department_id', 'designation_id', 'join_date', 'basic_salary', 'basic_working_time_per_day', 'medical_allowance', 'transport_allowance', 'accomodation_allowance', 'leave_allowance_per_year',
    ];

    public function leaves()
    {
    	return $this->belongsToMany('App\Leave')
    				->withPivot('from_date', 'to_date', 'total_leave_day', 'reason')
    				->withTimestamps();
    }

    public function payments()
    {
        return $this->hasMany('App\Payment');
    }

    public function attendances()
    {
        return $this->hasMany('App\Attendance');
    }

    public function designations()
    {
        return $this->hasMany('App\Designation');
    }

    
}
