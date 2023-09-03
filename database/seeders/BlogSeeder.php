<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed some blog data
        DB::table('blogs')->insert([
            [
                'title' => 'First blog post',
                'subtitle' => 'An introduction to our blog',
                'description' => 'Experience the beauty and spirituality of Umrah with our affordable packages.',
                'image' => 'dummy.jpg',
            ],
            [
                'title' => '10 tips for a successful business',
                'subtitle' => 'Learn the best practices to succeed in your industry',
                'description' => 'Experience the beauty and spirituality of Umrah with our affordable packages.',
                'image' => 'dummy.jpg',
            ],
            [
                'title' => 'How to increase your website traffic',
                'subtitle' => 'Proven strategies to attract more visitors to your site',
                'description' => 'Experience the beauty and spirituality of Umrah with our affordable packages.',
                'image' => 'dummy.jpg',
            ],
        ]);
    }
}
