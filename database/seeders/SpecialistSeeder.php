<?php

namespace Database\Seeders;

use App\Models\Specialist;
use Illuminate\Database\Seeder;

class SpecialistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialists = [
            [
                'title' => 'ICT',
                'description' => 'ICT Specialist',
                'image' => '1682391808.jpg',
                'category_id' => 3,
                'order' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Chemistry 1st Part',
                'description' => 'Chemistry 1st Part',
                'image' => '1682391794.jpg',
                'category_id' => 2,
                'order' => 2,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Chemistry 2nd Part',
                'description' => 'Chemistry 2nd Part',
                'image' => '1682391784.png',
                'category_id' => 2,
                'order' => 3,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'BIOLOGY 1ST Part',
                'description' => 'BIOLOGY 1ST Part',
                'image' => '1682391775.jpg',
                'category_id' => 2,
                'order' => 4,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'BIOLOGY 2nd Part',
                'description' => 'BIOLOGY 2nd Part',
                'image' => '1682391760.jpg',
                'category_id' => 2,
                'order' => 5,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Biology',
                'description' => 'Biology',
                'image' => '1682391745.jpg',
                'category_id' => 3,
                'order' => 6,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Physics',
                'description' => 'Physics',
                'image' => '1682391829.png',
                'category_id' => 3,
                'order' => 7,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($specialists as $specialist) {
            Specialist::create($specialist);
        }
    }
}
