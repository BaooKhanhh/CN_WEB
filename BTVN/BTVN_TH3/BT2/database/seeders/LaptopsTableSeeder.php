<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class LaptopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        foreach (range(1, 100) as $index) {
            DB::table('laptops')->insert([
                'brand' => $faker->company,               
                'model' => $faker->word,                  
                'specifications' => $faker->sentence,     
                'rental_status' => $faker->boolean,       
                'renter_id' => $faker->numberBetween(1, 10), 
                'created_at' => now(),                   
                'updated_at' => now(),                    
            ]);
    }
}
}
