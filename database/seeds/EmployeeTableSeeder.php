<?php

use Illuminate\Database\Seeder;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// $employee = new \App\Employee;
    	// $employee->photo = "backendtemplate/employeeimg/1601273755.jpeg";
     //    $employee->fname = "Myat";
     //    $employee->lname = "Min Thant";
     //    $employee->username = "Myat";
     //    $employee->email = "myat@gmail.com";
     //    $employee->address = "Pathein";
     //    $employee->phno1 = "09796597078";
     //    $employee->phno2 = "";
     //    $employee->date_of_birth = "1998-02-12";
     //    $employee->join_date = "2020-10-12";
     //    $employee->martial_status = "Single";
     //    $employee->gender = "Male";
     //    $employee->department_id = 1;
     //    $employee->designation_id = 1;
     //    $employee->save();

     //    $user = new \App\User;
     //    $user->name = "Myat";
     //    $user->email = "myat@gmail.com";
     //    $user->password = Hash::make("12345678");
     //    $user->employee_id = 1;
     //    $user->assignRole('admin');
     //    $user->save();
        


        $user = new \App\User;
        $user->name = "Myat";
        $user->email = "myat@gmail.com";
        $user->password = Hash::make("12345678");
        $user->assignRole('admin');
        $user->save();



        factory(\App\Employee::class, 5)->create();
    }
}
