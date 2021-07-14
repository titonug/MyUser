<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Tito Nugroho',
            'email' => 'tito@gmail.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => '123',
            'role' => 'admin',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => 'Ini Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => '123',
            'role' => 'admin',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => 'Ini User',
            'email' => 'user@gmail.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => '123',
            'role' => 'admin',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
