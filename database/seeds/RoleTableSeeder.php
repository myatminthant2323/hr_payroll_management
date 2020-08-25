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
        	'name' => 'head_of_department',
        	'guard_name' => 'web'
        ]);

        DB::table('roles')->insert([
        	'name' => 'employee',
        	'guard_name' => 'web'
        ]);

        DB::table('roles')->insert([
        	'name' => 'accountant',
        	'guard_name' => 'web'
        ]);
    }
}
