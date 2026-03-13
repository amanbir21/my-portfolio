<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('users')->insert([
            'name' => 'admin user',
            'email' => 'amanuelcompa55@gmail.com',
            'password' => Hash::make('Admin@123'), // Your test password
            'created_at' => now(),
            'updated_at' => now(),
            'is_admin' => true,
        ]);
    }
}
