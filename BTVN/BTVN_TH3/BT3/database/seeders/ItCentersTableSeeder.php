<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ItCentersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
       
        foreach (range(1, 50) as $index) {
            DB::table('it_centers')->insert([
                'name' => $faker->company,           
                'location' => $faker->address,        
                'contact_email' => $faker->email,     
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
