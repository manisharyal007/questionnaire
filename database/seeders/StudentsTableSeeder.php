<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use DB;

class StudentsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('students')->insert([
            [
                'name' => 'Manish Aryal',
                'email' => 'aryalmanish007@gmail.com',
            ],
            [
                'name' => 'Manish Aryal',
                'email' => 'aryalmanish0007@gmail.com',
            ],
        ]);

    }
}