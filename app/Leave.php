<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $fillable = [
        'leave_type',
    ];

    public function employees()
    {
    	return $this->belongsToMany('App\Employee')
    				->withPivot('from_date', 'to_date', 'total_leave_day', 'reason')
    				->withTimestamps();
    }
}
