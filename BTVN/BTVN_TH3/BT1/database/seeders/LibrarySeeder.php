<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class LibrarySeeder extends Seeder
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
            DB::table('libraries')->insert([
                'name' => $faker->company . ' Library',  // Tên thư viện giả lập
                'address' => $faker->address,           // Địa chỉ thư viện
                'contact_number' => $faker->phoneNumber, // Số điện thoại liên hệ
            ]);
        }
    }
}
