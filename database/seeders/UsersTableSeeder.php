<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin1',
                'email' => 'admin1@gmail.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Admin2',
                'email' => 'admin2@gmail.com',
                'password' => Hash::make('password123'),
            ],
        ]);
    }
}
