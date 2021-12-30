<?php

use Illuminate\Database\Seeder;

class DesignationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Designation::class, 2)->create();
    }
}
