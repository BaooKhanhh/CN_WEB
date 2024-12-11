<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 50) as $index) { 
            // Lấy một cinema_id ngẫu nhiên từ bảng cinemas
            $cinema_id = DB::table('cinemas')->inRandomOrder()->first()->id;

            DB::table('movies')->insert([
                'title' => $faker->sentence(3),
                'director' => $faker->name,
                'release_date' => $faker->date,
                'duration' => $faker->numberBetween(90, 180), // Thời gian phim từ 90 đến 180 phút
                'cinema_id' => $cinema_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
