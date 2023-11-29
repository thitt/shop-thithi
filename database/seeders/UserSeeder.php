<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();
        DB::table('users')->insert(
            [
                [
                    'email' => 'admin@gmail.com',
                    'first_name' => 'Test',
                    'last_name' => 'Admin',
                    'password' => bcrypt('12345678'),
                    'role' => ROLE_USER['admin'],
                    'created_at' => now(),
                ],
                [
                    'email' => 'super_admin@gmail.com',
                    'first_name' => 'Super',
                    'last_name' => 'Admin',
                    'password' => bcrypt('12345678'),
                    'role' => ROLE_USER['super_admin'],
                    'created_at' => now(),
                ]
            ]
        );
    }
}
