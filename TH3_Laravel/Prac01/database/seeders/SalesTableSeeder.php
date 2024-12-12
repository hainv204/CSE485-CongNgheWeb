<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $medicineID = DB::table('medicines')->pluck('id');
        for ($i = 0; $i < 100; $i++) {
        DB::table('sales')->insert([
        'medicine_id'=>$faker->randomElement($medicineID),
        'quantity'=>$faker->numberBetween(1,100),
        'sale_date'=>$faker->dateTimeThisYear(),//Tạo ngày bán ngẫu nhiên trong năm
        'customer_phone'=>$faker->phoneNumber//Tạo số đt ngẫu nhiên
        ]);
        }
    }
}