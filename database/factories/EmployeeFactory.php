<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {


    return [
        'photo' => 'backendtemplate/employeeimg/' . $faker->image('public/backendtemplate/employeeimg',400,300, null, false),
        'user_id' => factory(App\User::class),
        'fname' => $faker->firstName,
        'lname' => $faker->lastName,
        'username' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phno1' => $faker->phoneNumber,
        'phno2' => $faker->phoneNumber,
        'date_of_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'gender' => $faker->randomElement($array = array ('Male','Female')),
        'address' => $faker->address,
        'martial_status' => $faker->randomElement($array = array ('Single','Married')),
        'department_id' => factory(App\Department::class),
        'designation_id' => factory(App\Designation::class),
        'join_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        
    ];
});
