<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run()
    {

        DB::table('users')->insert([
            'name' => "Muhammad Ahmad ",
            'email' => "meharahmad.ft6@gmail.com",
            'role' => "admin",
            'password' => bcrypt('ahmoo123'),  // Hash password
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
