<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $fillable = [
        'designation_name',
    ];

    public function employees()
    {
        return $this->belongsTo('App\Employee');
    }

    // public function payrolls()
    // {
    //     return $this->hasManyThrough('App\Payroll','App\Employee','designation_id','employee_id');
    // }
}
