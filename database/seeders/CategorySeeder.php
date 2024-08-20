<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['category_name' => 'all-inclusive'],
            ['category_name' => 'low-budget'],
            ['category_name' => 'tent trip'],
            ['category_name' => 'camper trip'],
            ['category_name' => 'city-break'],
            ['category_name' => ' 	other'],
        ]);   
    }
}
