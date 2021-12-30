<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
	
	protected $fillable = [
        'employee_id', 'working_date', 'in_time', 'out_time', 'overtime_hour', 
    ];

    public function employee()
    {
        return $this->hasOne('App\Employee');
    }
}
