<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Overtime extends Model
{
    protected $fillable = [
        'employee_id', 'overtime_date', 'overtime_hour', 'overtime_rate', 'description',  'status', 'user_id',
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
