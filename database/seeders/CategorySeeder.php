<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'category_name' => 'Pulses',
                'category_slug' => 'pulses',
                'category_img' => 'uploads/categories/poha.jpg',
                'category_hexcolor' => '#f0f8ff',
                'status' => 1,
                // 'created_at' => Carbon::create('2025', '06', '13', '03', '41', '17'),
                // 'updated_at' => Carbon::create('2025', '06', '13', '03', '41', '43'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'category_name' => 'Rice',
                'category_slug' => 'rice',
                'category_img' => 'uploads/categories/rice.jpg',
                'category_hexcolor' => '#c7dbb1',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'category_name' => 'Poha',
                'category_slug' => 'poha',
                'category_img' => 'uploads/categories/pulses.jpg',
                'category_hexcolor' => '#f4ece3',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'category_name' => 'Besan',
                'category_slug' => 'besan',
                'category_img' => 'uploads/categories/besan.jpg',
                'category_hexcolor' => '#f0f8ff',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
