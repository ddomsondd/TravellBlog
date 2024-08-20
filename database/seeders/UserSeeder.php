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
        DB::table('users')->insert([
            ['name' => 'admin', 'email' => 'admin@a.a', 'password' => bcrypt('Admin123'), 'role' => 1, bio => 'I am the admin'],
            ['name' => 'Piotr', 'email' => 'p.piotr@p.pl', 'password' => bcrypt('PIOTRpiotr2!!'), 'role' => 0, 'bio' => 'There is a list of countries i have visit in my life: Poland, England, Maroko, Germany, France. I have hope to see lot more :3', 'bio_photo' => '1704733438.jpg'],
            ['name' => 'Adam', 'email' => 'adam@a.a', 'password' => bcrypt('ADAMadam2!!'), 'role' => 0, 'bio' => 'Jestem studentem informatyki i lubię podróże! Najchętniej do ciepłych krajów!', 'bio_photo' => '1705171271.jpg'],
            ['name' => 'Dorota', 'email' => 'dorka@onet.pl', 'password' => bcrypt('DORKAdorka2!!'), 'role' => 0, 'bio' => '- studentka medycyny, większe podróże od niedawna, aspiracje na zwiedzenie całego świata :D', 'bio_photo' => '1705172139.jpg'],
            ['name' => 'Anastazja', 'email' => 'a.nastazja@gmail.com', 'password' => brcypt('nastkAAAAA'), 'role' => 0]
        ]);
    }
}
