<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Create some sample categories
        $categories = [
            [
                'title' => 'Hsc',
                'description' => 'Hsc',
                'image' => '01.jpg',
                'order' => 1,
            ],
            [
                'title' => 'SSC',
                'description' => 'SSC',
                'image' => '02.jpg',
                'order' => 2,
            ],
        ];

        // Insert the categories into the database
        Category::insert($categories);
    }
}
