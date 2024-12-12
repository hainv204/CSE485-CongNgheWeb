<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            DB::table('movies')->insert([
                'title' => $faker->name,
                'director' => $faker->name,
                'release_date' => $faker->date,
                'duration' => $faker->numberBetween(100, 200),
                'cinema_id' => $faker->numberBetween(1, 10),
            ]);
        }
    }
}
