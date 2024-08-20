<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comments')->insert([
            [
                'user_id' => 3, 'post_id' => 8, 'content' => 'Bardzo polecam Tromso!', 'created_at' => '2024-01-12 16:26:45', 'updated_at' => '2024-01-12 16:26:45'
            ],
            [
                'user_id' => 4, 'post_id' => 6, 'content' => 'Ależ świetne renifery! :D', 'created_at' => '2024-01-12 16:27:26', 'updated_at' => '2024-01-12 16:27:26'
            ],
            [
                'user_id' => 5, 'post_id' => 8, 'content' => 'Ale czaaad! :O', 'created_at' => '2024-01-12 22:29:15', 'updated_at' => '2024-01-12 22:29:15'
            ],
            [
                'user_id' => 3, 'post_id' => 7, 'content' => 'To naprawdę świetne zdjęcie! :D', 'created_at' => '2024-01-12 23:58:13', 'updated_at' => '2024-01-12 23:58:13'
            ],
            [
                'user_id' => 1, 'post_id' => 4, 'content' => 'Oj pizzę to by się zjadło :P', 'created_at' => '2024-01-13 00:07:08', 'updated_at' => '2024-01-13 00:07:08'
            ],
            [
                'user_id' => 5, 'post_id' => 3, 'content' => 'Super!', 'created_at' => '2024-01-10 14:01:56', 'updated_at' => '2024-01-10 14:01:56'
            ],
            [
                'user_id' => 4, 'post_id' => 3, 'content' => 'Mega fota!', 'created_at' => '2024-01-10 14:01:56', 'updated_at' => '2024-01-10 14:01:56'
            ],
        ]);
    }
}
