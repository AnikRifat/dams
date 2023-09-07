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
                'title' => 'Cardiologist',
                'description' => 'Heart Specialist',
                'image' => 'cardiologist.jpg',
                'category_id' => 1, // You may need to adjust the category_id as per your category structure.
                'order' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'ENT Specialist',
                'description' => 'Ear, Nose, and Throat Specialist',
                'image' => 'ent_specialist.jpg',
                'category_id' => 1, // You may need to adjust the category_id as per your category structure.
                'order' => 2,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Dermatologist',
                'description' => 'Skin Specialist',
                'image' => 'dermatologist.jpg',
                'category_id' => 1, // You may need to adjust the category_id as per your category structure.
                'order' => 3,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Orthopedic Surgeon',
                'description' => 'Orthopedic Specialist',
                'image' => 'orthopedic_surgeon.jpg',
                'category_id' => 1, // You may need to adjust the category_id as per your category structure.
                'order' => 4,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Gynecologist',
                'description' => 'Women\'s Health Specialist',
                'image' => 'gynecologist.jpg',
                'category_id' => 1, // You may need to adjust the category_id as per your category structure.
                'order' => 5,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Pediatrician',
                'description' => 'Child Health Specialist',
                'image' => 'pediatrician.jpg',
                'category_id' => 1, // You may need to adjust the category_id as per your category structure.
                'order' => 6,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Ophthalmologist',
                'description' => 'Eye Specialist',
                'image' => 'ophthalmologist.jpg',
                'category_id' => 1, // You may need to adjust the category_id as per your category structure.
                'order' => 7,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more specialist records as needed
        ];

        foreach ($specialists as $specialist) {
            Specialist::create($specialist);
        }
    }
}
