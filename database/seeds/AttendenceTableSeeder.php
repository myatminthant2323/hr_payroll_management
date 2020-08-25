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
        factory(App\Attendence::class, 5)->create();
    }
}
