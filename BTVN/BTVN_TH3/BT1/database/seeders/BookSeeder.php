<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $faker = Faker::create();

        
        for ($i = 0; $i < 100; $i++) {
            DB::table('books')->insert([
                'title' => $faker->sentence,              // Tiêu đề sách
                'author' => $faker->name,                 // Tác giả
                'publication_year' => $faker->year,       // Năm xuất bản
                'genre' => $faker->word,                  // Thể loại
                'library_id' => $faker->numberBetween(1, 10), 
            ]);
        }
    }
}
