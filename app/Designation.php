<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $fillable = [
        'designation_name',
    ];

    public function employee()
    {
        return $this->hasOne('App\Employee');
    }
}
