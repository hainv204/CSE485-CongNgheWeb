<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $category_id = DB::table("categories")->pluck('id');
        for($i = 0;$i<100;$i++){
            DB::table("news")->insert([
                "title" => $faker->name,
                "content" => $faker->text,
                "image"=>$faker->imageUrl(600,450),
                "created_at" => $faker->dateTimeThisYear,
                "category_id" => $faker->randomElement($category_id)
            ]);
        }
    }
}