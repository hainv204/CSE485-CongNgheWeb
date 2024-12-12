<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class HardwareDevicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $deviceTypes = ['Mouse', 'Keyboard', 'Headset'];
        $centerIds = DB::table('it_centers')->pluck('id');

        for ($i = 0; $i < 100; $i++) {
                DB::table('hardware_devices')->insert([
                'device_name' => $faker->word,
                'type' => $faker->randomElement($deviceTypes),
                'status' => $faker->boolean,
                'center_id' => $faker->randomElement($centerIds),
            ]);
        }
    }
}