<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class MedicinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
        DB::table('medicines')->insert([
        'name'=>$faker->word,//word: tạo tên thuốc ngẫu nhiên
        'brand'=>$faker->company,//company: tạo tên công ty ngẫu nhiên
        //randomElement: chọn ngẫu nhiên 1 phần tử trong mảng
        'dosage'=>$faker->randomElement(['100mg','200mg','300mg','400mg','500mg']),
        //randomElement: chọn ngẫu nhiên 1 phần tử trong mảng
        'form'=>$faker->randomElement(['tablet','capsule','syrup','injection']),
        //randomFloat: tạo số ngẫu nhiên có 2 chữ số khoảng từ 1 đến 100
        'price'=>$faker->randomFloat(2,1,100),
        //numberBetween: tạo số ngẫu nhiên từ 0 đến 1000
        'stock'=>$faker->numberBetween(0,1000)
        ]);
        }
    }
}