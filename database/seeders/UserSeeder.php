<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'User1',
            'email' => 'user1@dev.com',
            'password' => Hash::make('user1@dev.com'),
        ]);
    }
}
