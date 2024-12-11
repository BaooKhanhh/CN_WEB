<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class RentersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        foreach (range(1, 10) as $index) {
            DB::table('renters')->insert([
                'name' => $faker->name,                 // Tên người thuê
                'phone_number' => $faker->phoneNumber,  // Số điện thoại
                'email' => $faker->unique()->safeEmail, // Email (duy nhất)
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
}
}