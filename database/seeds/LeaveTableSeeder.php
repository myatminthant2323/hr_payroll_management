<?php

use Illuminate\Database\Seeder;

class LeaveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Leave::class, 5)->create();
    }
}
