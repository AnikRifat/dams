<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $medicalItems = [
            [
                'name' => "MediMask Pro - N95 Respirator Mask",
                'description' => "<h2 class='specification-section__title mb-3' style='text-align:center;'>Product Description</h2> <p>The MediMask Pro N95 Respirator Mask provides superior protection against airborne particles, including viruses and bacteria. It is designed for medical professionals and individuals seeking maximum safety.</p>",
                'price' => 24.99,
                'image' => "medimask_pro.jpg",
                'status' => 1,
                'created_at' => "2023-05-19 10:15:00",
                'updated_at' => "2023-05-19 10:15:00",
            ],
            [
                'name' => "Digital Infrared Thermometer",
                'description' => "<h2 class='specification-section__title mb-3' style='text-align:center;'>Product Description</h2> <p>The Digital Infrared Thermometer allows for quick and accurate temperature measurement without physical contact. It's suitable for home and medical use.</p>",
                'price' => 39.99,
                'image' => "infrared_thermometer.jpg",
                'status' => 1,
                'created_at' => "2023-05-19 10:30:00",
                'updated_at' => "2023-05-19 10:30:00",
            ],
            [
                'name' => "Disposable Medical Gloves (Box of 100)",
                'description' => "<h2 class='specification-section__title mb-3' style='text-align:center;'>Product Description</h2> <p>These disposable medical gloves are made from high-quality materials and provide excellent hand protection. Each box contains 100 gloves suitable for medical and personal use.</p>",
                'price' => 14.99,
                'image' => "medical_gloves.jpg",
                'status' => 1,
                'created_at' => "2023-05-19 10:45:00",
                'updated_at' => "2023-05-19 10:45:00",
            ],
            [
                'name' => "Face Shield with Adjustable Headband",
                'description' => "<h2 class='specification-section__title mb-3' style='text-align:center;'>Product Description</h2> <p>The Face Shield with Adjustable Headband provides full-face protection against droplets and splashes. It features a comfortable headband for extended wear.</p>",
                'price' => 9.99,
                'image' => "face_shield.jpg",
                'status' => 1,
                'created_at' => "2023-05-19 11:00:00",
                'updated_at' => "2023-05-19 11:00:00",
            ],
            [
                'name' => "Hand Sanitizer Gel (500ml)",
                'description' => "<h2 class='specification-section__title mb-3' style='text-align:center;'>Product Description</h2> <p>The Hand Sanitizer Gel effectively kills germs and bacteria. It comes in a convenient 500ml bottle, making it ideal for personal hygiene and medical settings.</p>",
                'price' => 8.99,
                'image' => "hand_sanitizer.jpg",
                'status' => 1,
                'created_at' => "2023-05-19 11:15:00",
                'updated_at' => "2023-05-19 11:15:00",
            ],
            // Add additional medical items here
            [
                'name' => "Product Name 1",
                'description' => "Description for Product 1",
                'price' => 99.99,
                'image' => "product_image_1.jpg",
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => "Product Name 2",
                'description' => "Description for Product 2",
                'price' => 79.99,
                'image' => "product_image_2.jpg",
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more medical items if needed
        ];

        foreach ($medicalItems as $item) {
            Product::create($item);
        }
    }
}
