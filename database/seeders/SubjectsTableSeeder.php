<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = [
            [
                'name' => 'Physics',
                'code' => 'S001',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Chemistry',
                'code' => 'S002',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more subjects as needed
        ];

        // Insert data into the subjects table
        DB::table('subjects')->insert($subjects);
    }
}
