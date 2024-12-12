<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $gradeLevels = [
            'kindergarten', 'first_grade', 'second_grade', 'third_grade', 'fourth_grade', 
            'fifth_grade', 'sixth_grade', 'seventh_grade', 'eighth_grade', 'ninth_grade', 
            'tenth_grade', 'eleventh_grade', 'twelfth_grade'
        ];

        for ($i = 0; $i < 100; $i++) {
            DB::table('classes')->insert([
                'grade_level' => $faker->randomElement($gradeLevels),
                'room_number' => $faker->bothify('Room ###')
            ]);
        }
    }
}