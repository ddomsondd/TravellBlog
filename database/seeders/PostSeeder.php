<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            [
                'user_id' => 1, 'category_id' => 6, 'title' => 'INFO',
                'content' => 'This is a blog about traveling. You can find here a lot of interesting articles about traveling. You can also add your own articles. Enjoy!',
                'visible' => 1, 'created_at' => '2024-01-04 21:36:04', 'updated_at' => '2024-01-04 21:36:04'
            ],
            [
                'user_id' => 1, 'category_id' => 6, 'title' => 'Niewidoczny post',
                'content' => 'To jest post, który nie jest widoczny dla użytkowników. Można go zobaczyć tylko w panelu administratora.',
                'visible' => 0, 'created_at' => '2024-01-04 21:40:36', 'updated_at' => '2024-01-12 22:28:37'
            ],
            [
                'user_id' => 3, 'category_id' => 3, 'title' => 'Moja podróż na Sri Lanke....',
                'content' => '#SriLanka
                Razem z moją dziewczyną poleciałem na Sri Lankę. Dziewczyna jest fajnką yogi, co chyba widać na poniższym zdjęciu ;P',
                'image' => '1704750983.jpg', 'visible' => 1, 'created_at' => '2024-01-08 14:01:56', 'updated_at' => '2024-01-12 22:32:23'
            ],
            [
                'user_id' => 3, 'category_id' => 5, 'title' => 'Pewnego razu w Rzymie',
                'content' => '#Rzym #Włochy
                Długo planowałem, aby polecieć do Rzymu. W końcu udało się na weekendowy wyjazd. Bardzo polecam! Bilety można dorwać w naprawdę niskich cenach, a widoki piękne plus PYSZNA PIZZA!',
                'created_at' => '2024-01-08 16:20:52', 'visible' => 1,  'updated_at' => '2024-01-12 22:33:43'
            ],
            [
                'user_id' => 2, 'category_id' => 2, 'title' => 'JAPONIA!',
                'content' => '#Japonia
                Zwiedzanie Japonii rozpocząłem od wylotu z Warszawy. Radzę śledzić tanie loty, ponieważ można złowić naprawdę świetne promocyjne okazje! Głównie przebywałem w Tokio, ale odwiedziłem także Kioto i Jokohamę. Było co zwiedzać.',
                'image' => '1704737028.jpg','visible' => 1,  'created_at' => '2024-01-08 18:03:48', 'updated_at' => '2024-01-12 19:14:40'
            ],
            [
                'user_id' => 2, 'category_id' => 4, 'title' => 'LaLaLaponia',
                'content' => '#Finlandia #Laponia
                Widziałem renifery!', 'image' => '1704746337.jpg', 'visible' => 1, 'created_at' => '2024-01-08 18:31:18', 'updated_at' => '2024-01-12 19:12:33'
            ],
            [
                'user_id' => 3, 'category_id' => 1, 'title' => 'WOW',
                'content' => 'Dalej nie wierzę, że zrobiłem takie świetne zdjęcie w Maroko!',
                'image' => '1704746836.jpg', 'visible' => 1, 'created_at' => '2024-01-08 20:47:16', 'updated_at' => '2024-01-12 22:29:30'
            ],
            [
                'user_id' => 2, 'category_id' => 3, 'title' => 'Norwegia pod namiotem',
                'content' => '#Norwegia #Tromso
                Wyjazd do Norwegii - zdecydowanie pod namiot. Można naprawdę dużo zaoszczędzić, a klimat świetny. Na dodatek miasto Tromso to idealne miejsce do polowania na zorzę polarną. Widoki nie z tej ziemi!',
                'image' => '1705097313.jpg', 'visible' => 1, 'created_at' => '2024-01-12 22:08:33', 'updated_at' => '2024-01-12 22:08:33'
            ],
            [
                'user_id' => 1, 'category_id' => 3, 'title' => 'W góry z namiotem',
                'content' => 'Świetne doświadczenie i możliwość bliskiego obcowania z naturą',
                'image' => '1705167716.jpg', 'visible' => 1, 'created_at' => '2024-01-13 17:41:56', 'updated_at' => '2024-01-13 17:41:56'
            ],
            [
                'user_id' => 5, 'category_id' => 4, 'title' => 'Kraina wiecznej wiosny',
                'content' => 'Madera to niezwykle malowniczy region Portugalii...',
                'image' => '1705913114.jpg', 'visible' => 1, 'created_at' => '2024-01-22 08:45:14', 'updated_at' => '2024-01-22 08:45:14'
            ]
        ]);
    }
}
