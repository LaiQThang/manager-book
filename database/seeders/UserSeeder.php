<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            'full_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => hash('111111', PASSWORD_BCRYPT),
            'permission' => '2',
            'remember_token' => hash_hmac('sha256', Str::random(40), config('app.key')),
        ]);
    }
}
