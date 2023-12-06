<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('colors')->truncate();
        DB::table('colors')->insert([
            ['color_name' => 'Blue', 'hex_code' => 'blue'],
            ['color_name' => 'Gray', 'hex_code' => 'gray'],
            ['color_name' => 'Green', 'hex_code' => 'green'],
            ['color_name' => 'Red', 'hex_code' => 'red'],
            ['color_name' => 'Orange', 'hex_code' => 'orange'],
            ['color_name' => 'Yellow', 'hex_code' => 'yellow'],
            ['color_name' => 'Black', 'hex_code' => 'black'],
        ]);
    }
}
