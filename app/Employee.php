<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'photo', 'fname', 'lname', 'username', 'email', 'address', 'phno1', 'phno2', 'date_of_birth', 'gender', 'martial_status', 'department_id', 'designation_id', 'join_date', 'basic_salary', 'basic_working_time_per_day',
    ];


    public function salary()
    {
        return $this->hasOne('App\Salary');
    }

    public function payrolls()
    {
        return $this->hasMany('App\Payroll');
    }

    public function department()
    {
        return $this->hasOne('App\Department');
    }

    public function designation()
    {
        return $this->hasOne('App\Designation');
    }

    public function leaves()
    {
        return $this->hasMany('App\Leave');
    }

    public function overtimes()
    {
        return $this->hasMany('App\Overtime');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    
}
