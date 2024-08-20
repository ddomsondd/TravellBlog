<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('likes')->insert([
            ['user_id' => 1, 'post_id' => 4],
            ['user_id' => 1, 'post_id' => 5],
            ['user_id' => 1, 'post_id' => 6],
            ['user_id' => 2, 'post_id' => 3],
            ['user_id' => 2, 'post_id' => 4],
            ['user_id' => 2, 'post_id' => 5],
            ['user_id' => 3, 'post_id' => 8],
            ['user_id' => 3, 'post_id' => 5],
            ['user_id' => 3, 'post_id' => 7],
            ['user_id' => 3, 'post_id' => 6],
            ['user_id' => 4, 'post_id' => 6],
            ['user_id' => 4, 'post_id' => 3],
            ['user_id' => 5, 'post_id' => 8],
            ['user_id' => 5, 'post_id' => 3],
            ['user_id' => 5, 'post_id' => 5],
            ['user_id' => 5, 'post_id' => 6]
        ]);
    }
}
