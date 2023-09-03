<?php

namespace Database\Seeders;

use App\Models\Duration;
use Illuminate\Database\Seeder;

class DurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Duration::create([
            'timeline' => '9 am - 12 pm',
            'status' => 1,
        ]);

        Duration::create([
            'timeline' => '12 pm - 3 pm',
            'status' => 1,
        ]);
        Duration::create([
            'timeline' => '3 pm - 6 pm',
            'status' => 1,
        ]);
    }
}
