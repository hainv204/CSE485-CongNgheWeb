<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class LaptopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $renterID = DB::table('renters')->pluck('id');
        for($i=0;$i<100;$i++){
            DB::table('laptops')->insert([
                'brand' => $faker->company,
                'model' => $faker->word,
                'specifications' => $faker->randomElement(['i5, 8GB RAM, 256GB SSD', 'i7, 16GB RAM, 512GB SSD', 'i3, 4GB RAM, 128GB SSD']),
                'rental_status' => $faker->boolean,
                'renter_id' => $faker->randomElement($renterID)
            ]);
        }
    }
}