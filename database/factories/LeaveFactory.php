<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Leave;
use Faker\Generator as Faker;

$factory->define(Leave::class, function (Faker $faker) {
    return [
        'employee_id' => factory(App\Employee::class),
        'leave_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'total_leave_day' => $faker->numberBetween($min = 1, $max = 90),
        'reason' => $faker->realText($maxNbChars = 50, $indexSize = 2),
        'status' => $faker->numberBetween($min = 0, $max = 2),
        'user_id' => factory(App\User::class),
    ];
});
