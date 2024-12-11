<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class HardwareDevicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Tạo 50 thiết bị phần cứng giả lập
        foreach (range(1, 50) as $index) {
            DB::table('hardware_devices')->insert([
                'device_name' => $faker->word,       
                'type' => $faker->randomElement(['Mouse', 'Keyboard', 'Headset']), 
                'status' => $faker->boolean,          
                'center_id' => $faker->numberBetween(1, 10), 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
