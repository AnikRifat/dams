<?php

namespace Database\Seeders;
// database/seeders/AppointmentSeeder.php

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    public function run()
    {
        $creator_id = User::where('role', 2)->pluck('id')->toArray();
        $faker = \Faker\Factory::create();

        $appointments = [
            [
                'title' => 'Introduction to Programming',
            ],
            [
                'title' => 'Web Development Bootcamp',
            ],
            // Add more appointments with different titles and descriptions here
            // ...
        ];

        for ($i = 2; $i <= 51; $i++) {
            // $appointment = $appointments[$i % count($appointments)];

            Appointment::create([
                'title' => 'Appointment ' . $i, // Append a number to make the appointment names unique
                'price' => $faker->randomNumber(2), // Increase price for each appointment
                'description' => 'description',
                'specialist_id' => $faker->numberBetween(1, 7),
                'creator_id' => $faker->randomElement(['2', '3', '4', '5', '6', '7', '8', '9', '10', '11']),
                'duration' => $faker->randomElement(['1', '2', '3']),
                'image' => 'appointment_image.jpg', // Fixed image name for all appointments
                'status' => 1,
            ]);
        }
    }
}
