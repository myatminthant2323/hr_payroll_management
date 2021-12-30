<?php

use Illuminate\Database\Seeder;

class AttendenceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Attendance::class, 2)->create();
    }
}
