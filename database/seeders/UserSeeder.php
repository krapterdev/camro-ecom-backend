<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Sahil kumar',
            'email' => 'sahil@example.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
        ]);
    }
}