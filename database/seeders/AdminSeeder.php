<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->insert([
            'email' => 'krapter.dev@gmail.com',
            'password' => 'Sahil',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
