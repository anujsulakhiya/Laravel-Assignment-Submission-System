<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role_name' => 'Faculty',
            'role_slug' => 'faculty',
        ]);

        DB::table('roles')->insert([
            'role_name' => 'Student',
            'role_slug' => 'student',
        ]);

        DB::table('roles')->insert([
            'role_name' => 'Admin',
            'role_slug' => 'admin',
        ]);

        DB::table('roles')->insert([
            'role_name' => 'Master',
            'role_slug' => 'master',
        ]);
    }
}
