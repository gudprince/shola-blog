<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'first_name' => 'Olaleye',
            'last_name' => 'Shola',
            'email' => 'super_admin@example.com',
            'phone_number' => '087666666666',
            'address' => '',
            'image' => '',
            'user_type' => 'super_admin',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'), // password
            'remember_token' => Str::random(10),
        ];

        User::create($data);
    }
}
