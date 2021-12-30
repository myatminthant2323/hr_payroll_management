<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $fillable = [
        'employee_id', 'leave_date', 'total_leave_day', 'reason', 'status', 'user_id',
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
