<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'employee_id' => factory(App\Employee::class),
        'user_id' => factory(App\User::class),
        'basic_salary' => $faker->numberBetween($min = 1000, $max = 90000),
        'basic_working_time_per_day' => $faker->numberBetween($min = 7, $max = 10),
        'overtime_rate' => $faker->numberBetween($min = 1, $max = 90),
        'medical_allowance' => $faker->numberBetween($min = 10, $max = 90000),
        'transport_allowance' => $faker->numberBetween($min = 10, $max = 90000),
        'accomodation_allowance' => $faker->numberBetween($min = 10, $max = 90000),
        'leave_allowance' => $faker->numberBetween($min = 5, $max = 30),
        'other_allowance' => $faker->numberBetween($min = 10, $max = 90000),
        'epf' => $faker->numberBetween($min = 1, $max = 30),
        'esi' => $faker->numberBetween($min = 1, $max = 30),
        'other_insurance' => $faker->numberBetween($min = 10, $max = 90000),
        'other_deduction' => $faker->numberBetween($min = 10, $max = 90000),
        'gross_salary' => $faker->numberBetween($min = 10, $max = 90000),
        'total_deduction' => $faker->numberBetween($min = 10, $max = 90000),
        'net_salary' => $faker->numberBetween($min = 10, $max = 90000),
    ];
});
