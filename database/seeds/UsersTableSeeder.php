<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'Faculty',
            'email' => 'faculty@gmail.com',
            'password' => bcrypt('123'),
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'Student',
            'email' => 'student@gmail.com',
            'password' => bcrypt('123'),
        ]);

        DB::table('users')->insert([
            'role_id' => '3',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
        ]);

        DB::table('users')->insert([
            'role_id' => '4',
            'name' => 'Manager',
            'email' => 'manager@gmail.com',
            'password' => bcrypt('123'),
        ]);
    }
}
