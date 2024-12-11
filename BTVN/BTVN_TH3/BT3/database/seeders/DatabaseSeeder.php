<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([
            ItCentersTableSeeder::class,      // Seeder cho bảng it_centers
            HardwareDevicesTableSeeder::class, // Seeder cho bảng hardware_devices
        ]);
    }
}
