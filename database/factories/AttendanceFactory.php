<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Attendance;
use Faker\Generator as Faker;

$factory->define(Attendance::class, function (Faker $faker) {
    return [
        'employee_id' => factory(App\Employee::class),
        'working_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'in_time' => $faker->time($format = 'H:i:s', $max = 'now'),
        'out_time' => $faker->time($format = 'H:i:s', $max = 'now'),
        'overtime_hour' => $faker->numberBetween($min = 1, $max = 90),
    ];
});
