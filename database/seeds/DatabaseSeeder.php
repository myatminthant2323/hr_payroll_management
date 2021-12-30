<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
    	$this->call(RoleTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(DesignationTableSeeder::class);
        $this->call(EmployeeTableSeeder::class);
        $this->call(LeaveTableSeeder::class);
        
        $this->call(AttendanceTableSeeder::class);
        // $this->call(PaymentTableSeeder::class);
        // $this->call(SalaryTableSeeder::class);
        // $this->call(Employee_leaveTableSeeder::class);
    }
}
