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
            'name' => 'Munashe',
            'email' => 'munachaps@gmail.com',
            'admin' => '1',
            'email_verified_at' => now(),
            'phone' => NULL,
            'location' => NULL,
            'about' => NULL,
            'password' => bcrypt('verysafepassword'),
            
        ]);
        \App\Models\User::create([
            'name' => 'Itai',
            'email' => 'itaineilchiriseri@gmail.com',
            'admin' =>'1',
            'email_verified_at' => now(),
            'phone' => NULL,
            'location' => NULL,
            'about' => NULL,
            'password' => bcrypt('verysafepassword'),
          
        ]);
    }
}
