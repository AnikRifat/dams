<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => "Wooden Desk Organizer with Pen Holder and Small Drawer",
                'description' => "<h2 class='specification-section__title mb-3' style='text-align:center;'>Product Description</h2> <p>This wooden desk organizer features a pen holder and a small drawer for storing your office supplies. It is perfect for keeping your desk neat and organized.</p>",
                'price' => 424.00,
                'image' => "1684431941.jpg",
                'status' => 1,
                'created_at' => "2023-05-18 17:45:41",
                'updated_at' => "2023-05-18 17:45:41",
            ],
            [
                'name' => "Heart's Tissue Paper Box",
                'description' => "<h2 class='specification-section__title mb-3' style='text-align:center;'>Product Description</h2> <p>This tissue paper box is designed in the shape of a heart, adding a touch of cuteness to your space. It is suitable for holding tissues and can be used in various rooms.</p>",
                'price' => 50.00,
                'image' => "1684432006.jpg",
                'status' => 1,
                'created_at' => "2023-05-18 17:46:46",
                'updated_at' => "2023-05-18 17:46:46",
            ],
            [
                'name' => "Good Luck Pen Stand-Multi Color 1 Pcs - 78489",
                'description' => "<h2 class='specification-section__title mb-3' style='text-align:center;'>Product Description</h2> <p>This pen stand comes in multiple colors and features a good luck charm. It is a perfect addition to your desk and can hold multiple pens or pencils.</p>",
                'price' => 30.00,
                'image' => "1684432032.jpg",
                'status' => 1,
                'created_at' => "2023-05-18 17:47:13",
                'updated_at' => "2023-05-18 17:47:13",
            ],
            [
                'name' => "Soft Rubber ID Card Holder",
                'description' => "<h2 class='specification-section__title mb-3' style='text-align:center;'>Product Description</h2> <p>This soft rubber ID card holder is flexible and durable. It can securely hold your ID card and prevent it from getting damaged or lost.</p>",
                'price' => 15.00,
                'image' => "1684432060.jpg",
                'status' => 1,
                'created_at' => "2023-05-18 17:47:41",
                'updated_at' => "2023-05-18 17:47:41",
            ],
            [
                'name' => "Pen Stand Square, 1 Pc",
                'description' => "<h2 class='specification-section__title mb-3' style='text-align:center;'>Product Description</h2> <p>This square-shaped pen stand is made of high-quality material and can hold multiple pens. It adds a touch of elegance to your desk or office space.</p>",
                'price' => 160.00,
                'image' => "1684432100.jpg",
                'status' => 1,
                'created_at' => "2023-05-18 17:48:20",
                'updated_at' => "2023-05-18 17:48:20",
            ],
            // Add additional products here
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
            // Add more products if needed
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
