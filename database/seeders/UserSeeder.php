<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         User::create([
            'name' => 'Md Rakibul Hasan',
            'email' => 'rakibulhasan.rh895@gmail.com',
            'role_id' => 1,
            'password' => bcrypt('password'),
        ]);
        User::create([
            'name' => 'Vendor',
            'email' => 'vendor@example.com',
            'role_id' => 2,
            'password' => bcrypt('password'),
        ]);
        User::create([
            'name' => 'Customer',
            'email' => 'customer@example.com',
            'role_id' => 3,
            'password' => bcrypt('password'),
        ]);
    }
}
