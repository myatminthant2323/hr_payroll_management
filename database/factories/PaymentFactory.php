<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Payment;
use Faker\Generator as Faker;

$factory->define(Payment::class, function (Faker $faker) {
    return [
        'employee_id' => factory(App\Employee::class),
        'user_id' => factory(App\User::class),
        'from_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'to_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'total_days' => $faker->numberBetween($min = 1, $max = 90),
        'total_overtime_hour' => $faker->numberBetween($min = 1, $max = 90),
        'overtime_rate' => $faker->numberBetween($min = 1, $max = 90),
        'overtime_amount' => $faker->numberBetween($min = 10, $max = 90000),
        'medical_allowance' => $faker->numberBetween($min = 10, $max = 90000),
        'transport_allowance' => $faker->numberBetween($min = 10, $max = 90000),
        'accomodation_allowance' => $faker->numberBetween($min = 10, $max = 90000),
        'bonus' => $faker->numberBetween($min = 10, $max = 90000),
        'other_allowance' => $faker->numberBetween($min = 10, $max = 90000),
        'tds' => $faker->numberBetween($min = 10, $max = 90000),
        'esi' => $faker->numberBetween($min = 10, $max = 90000),
        'loan' => $faker->numberBetween($min = 10, $max = 90000),
        'leave' => $faker->numberBetween($min = 10, $max = 90000),
        'other_deductions' => $faker->numberBetween($min = 10, $max = 90000),
        'payment_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'payment_mode' => $faker->creditCardType,
        'netpay' => $faker->numberBetween($min = 10, $max = 90000),
    ];
});
