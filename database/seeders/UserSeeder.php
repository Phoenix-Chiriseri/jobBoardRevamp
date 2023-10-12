<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Itai',
            'email' => 'munachaps@gmail.com',
            'email_verified_at' => now(),
            'phone' => NULL,
            'location' => NULL,
            'about' => NULL,
            'password' => bcrypt('verysafepassword'),
            
        ]);
        \App\Models\User::create([
            'name' => 'Munashe',
            'email' => 'itaineilchiriseri@gmail.com',
            'email_verified_at' => now(),
            'phone' => NULL,
            'location' => NULL,
            'about' => NULL,
            'password' => bcrypt('verysafepassword'),
          
        ]);
    }
}
