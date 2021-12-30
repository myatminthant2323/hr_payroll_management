<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        


        DB::table('roles')->insert([
        	'name' => 'admin',
        	'guard_name' => 'web'
        ]);

        DB::table('roles')->insert([
        	'name' => 'hr',
        	'guard_name' => 'web'
        ]);

        DB::table('roles')->insert([
            'name' => 'staff',
            'guard_name' => 'web'
        ]);
    }
}
