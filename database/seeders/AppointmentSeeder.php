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
                'title' => 'Web Development Bootcamp' . ' ' . ($i + 1), // Append a number to make the appointment names unique
                'price' => $faker->randomNumber(2), // Increase price for each appointment
                'description' => '<h3 style="box-sizing: inherit; -webkit-font-smoothing: antialiased; padding: 0px; max-width: 100%; font-family: var(--cds-font-family-source-sans-pro); font-size: var(--cds-font-size-title1-lg); line-height: var(--cds-line-height-title1-lg); font-weight: var(--cds-font-weight-600); letter-spacing: var(--cds-letter-spacing-125);"><span style="box-sizing: inherit; -webkit-font-smoothing: antialiased; font-weight: bolder;">Master cutting-edge programming skills and prepare for a high-growth tech career</span></h3><p style="box-sizing: inherit; -webkit-font-smoothing: antialiased; font-size: var(--cds-font-size-body1); line-height: var(--cds-line-height-body1); font-family: var(--cds-font-family-source-sans-pro); margin-bottom: 10px; max-width: 100%; color: var(--cds-color-black-500); padding-top: 16px;">Open the door to sought-after technology careers with a world-class online Bachelor of Science (BSc) in Computer Science degree from the University of London.</p><p style="box-sizing: inherit; -webkit-font-smoothing: antialiased; font-size: var(--cds-font-size-body1); line-height: var(--cds-line-height-body1); font-family: var(--cds-font-family-source-sans-pro); margin-bottom: 10px; max-width: 100%; color: var(--cds-color-black-500); padding-top: 16px;">Whether youre new to computer science or you work in the field, you can earn a valuable degree that will help accelerate your career. You’ll master in-demand computing skills and solve complex problems while honing your innovation and creativity. You’ll build the expertise to work as an application programmer, mobile app developer, or web developer, among high-demand other roles.</p><p style="box-sizing: inherit; -webkit-font-smoothing: antialiased; font-size: var(--cds-font-size-body1); line-height: var(--cds-line-height-body1); font-family: var(--cds-font-family-source-sans-pro); margin-bottom: 10px; max-width: 100%; color: var(--cds-color-black-500); padding-top: 16px;">Established by Royal Charter in 1836, the University of London is a globally recognised learning institution with over 40,000 patients abroad in 190 countries. UoL institution Goldsmiths Computing Research has an international reputation for research excellence, and has been awarded over £15 million in grants in the last five years.</p><h4 style="box-sizing: inherit; -webkit-font-smoothing: antialiased; padding: 16px 0px 0px; max-width: 100%; font-family: var(--cds-font-family-source-sans-pro); font-size: var(--cds-font-size-title2); line-height: var(--cds-line-height-title2); font-weight: var(--cds-font-weight-600); letter-spacing: var(--cds-letter-spacing-125);">What’s in this degree program?</h4><div class="rc-IconList css-1mgmp4c" style="box-sizing: inherit; -webkit-font-smoothing: antialiased; width: calc(50% - 32px); display: inline-block; margin-right: var(--cds-spacing-400); padding-top: var(--cds-spacing-300); color: rgb(55, 58, 60); font-family: OpenSans, Arial, sans-serif; font-size: 14px;"><div class="cds-9 css-7avemv cds-10" style="-webkit-font-smoothing: antialiased; width: calc(100% + 16px); display: flex; flex-wrap: wrap; margin: -8px;"><div class="cds-9 css-1xdhyk6 cds-11 cds-grid-item cds-45" style="-webkit-font-smoothing: antialiased; margin: 0px; flex-grow: 0; max-width: 8.33333%; flex-basis: 8.33333%; padding: 8px;"><svg aria-hidden="true" fill="none" focusable="false" height="20" viewBox="0 0 20 20" width="20" id="cds-react-aria-2" class="css-0"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.3 3.34h12.2V16a3.5 3.5 0 01-3.43 3.5H5.3V3.34zm1 1V18.5h7.755A2.5 2.5 0 0016.5 16V4.34H6.3z" fill="currentColor"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M14.67 7.66H8.13v-1h6.54v1zM14.67 10.5H8.13v-1h6.54v1zM14.67 13.34H8.13v-1h6.54v1zM11.87 16.18H8.13v-1h3.74v1z" fill="currentColor"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M2.5.5h12.67v3.34h-1V1.5H3.5v14.63h2.3v1H2.5V.5z" fill="currentColor"></path></svg></div><div class="cds-9 css-0 cds-11 cds-grid-item cds-44" style="-webkit-font-smoothing: antialiased; margin: 0px; flex-grow: 1; max-width: 100%; flex-basis: 0px; padding: 8px;"><div class="cds-119 css-80vnnb cds-121" style="box-sizing: inherit; -webkit-font-smoothing: antialiased; margin: 0px; font: var(--cds-typography-body1); letter-spacing: var(--cds-letter-spacing-body1); color: var(--cds-color-neutral-primary);">Complete 23 appointments (360 credit hours) accredited by the University of London.</div></div></div></div><div class="rc-IconList css-1mgmp4c" style="box-sizing: inherit; -webkit-font-smoothing: antialiased; width: calc(50% - 32px); display: inline-block; margin-right: var(--cds-spacing-400); padding-top: var(--cds-spacing-300); color: rgb(55, 58, 60); font-family: OpenSans, Arial, sans-serif; font-size: 14px;"><div class="cds-9 css-7avemv cds-10" style="-webkit-font-smoothing: antialiased; width: calc(100% + 16px); display: flex; flex-wrap: wrap; margin: -8px;"><div class="cds-9 css-1xdhyk6 cds-11 cds-grid-item cds-45" style="-webkit-font-smoothing: antialiased; margin: 0px; flex-grow: 0; max-width: 8.33333%; flex-basis: 8.33333%; padding: 8px;"><svg aria-hidden="true" fill="none" focusable="false" height="20" viewBox="0 0 20 20" width="20" id="cds-react-aria-3" class="css-0"><path fill-rule="evenodd" clip-rule="evenodd" d="M.5 3.56C.5 2.694 1.194 2 2.06 2h3.8c.534 0 1.04.214 1.414.586l.004.005 1.187 1.217A.673.673 0 008.94 4h9c.866 0 1.56.694 1.56 1.56V18H.5V3.56zM2.06 3a.554.554 0 00-.56.56V17h17V5.56a.554.554 0 00-.56-.56h-9c-.438 0-.867-.17-1.184-.486l-.004-.005-1.188-1.217A.998.998 0 005.86 3h-3.8z" fill="currentColor"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M19 8H1V7h18v1z" fill="currentColor"></path></svg></div><div class="cds-9 css-0 cds-11 cds-grid-item cds-44" style="-webkit-font-smoothing: antialiased; margin: 0px; flex-grow: 1; max-width: 100%; flex-basis: 0px; padding: 8px;"><div class="cds-119 css-80vnnb cds-121" style="box-sizing: inherit; -webkit-font-smoothing: antialiased; margin: 0px; font: var(--cds-typography-body1); letter-spacing: var(--cds-letter-spacing-body1); color: var(--cds-color-neutral-primary);">Learn or perfect your use of widely adopted programming languages such as Python, C++, C#, Java Script.</div></div></div></div><div class="rc-IconList css-1mgmp4c" style="box-sizing: inherit; -webkit-font-smoothing: antialiased; width: calc(50% - 32px); display: inline-block; margin-right: var(--cds-spacing-400); padding-top: var(--cds-spacing-300); color: rgb(55, 58, 60); font-family: OpenSans, Arial, sans-serif; font-size: 14px;"><div class="cds-9 css-7avemv cds-10" style="-webkit-font-smoothing: antialiased; width: calc(100% + 16px); display: flex; flex-wrap: wrap; margin: -8px;"><div class="cds-9 css-1xdhyk6 cds-11 cds-grid-item cds-45" style="-webkit-font-smoothing: antialiased; margin: 0px; flex-grow: 0; max-width: 8.33333%; flex-basis: 8.33333%; padding: 8px;"><svg aria-hidden="true" fill="none" focusable="false" height="20" viewBox="0 0 20 20" width="20" id="cds-react-aria-4" class="css-0"><g clip-path="url(#cds-react-aria-4_0)" fill-rule="evenodd" clip-rule="evenodd" fill="currentColor"><path d="M10.834 4.892a6.99 6.99 0 104.274 4.274.5.5 0 01.944-.332 7.99 7.99 0 11-4.886-4.886.5.5 0 01-.332.944zM17.073.12l.829 1.978 1.978.829-3.244 3.245-2.634-.147-.242-2.592L17.073.12zM14.8 3.807l.118 1.268 1.326.073 1.876-1.875-.982-.411-.411-.982L14.8 3.807z"></path><path d="M14.813 5.186a.5.5 0 010 .708l-5.97 5.97a.5.5 0 11-.707-.708l5.97-5.97a.5.5 0 01.707 0z"></path><path d="M8.53 8.5a2.97 2.97 0 100 5.94 2.97 2.97 0 000-5.94zm-3.97 2.97a3.97 3.97 0 117.94 0 3.97 3.97 0 01-7.94 0z"></path></g><defs><clipPath id="cds-react-aria-4_0"><path fill="#fff" d="M0 0h20v20H0z"></path></clipPath></defs></svg></div><div class="cds-9 css-0 cds-11 cds-grid-item cds-44" style="-webkit-font-smoothing: antialiased; margin: 0px; flex-grow: 1; max-width: 100%; flex-basis: 0px; padding: 8px;"><div class="cds-119 css-80vnnb cds-121" style="box-sizing: inherit; -webkit-font-smoothing: antialiased; margin: 0px; font: var(--cds-typography-body1); letter-spacing: var(--cds-letter-spacing-body1); color: var(--cds-color-neutral-primary);">Use your new knowledge and skills to create a final individual project: developing your own software.</div></div></div></div><div class="rc-IconList css-1mgmp4c" style="box-sizing: inherit; -webkit-font-smoothing: antialiased; width: calc(50% - 32px); display: inline-block; margin-right: var(--cds-spacing-400); padding-top: var(--cds-spacing-300); color: rgb(55, 58, 60); font-family: OpenSans, Arial, sans-serif; font-size: 14px;"><div class="cds-9 css-7avemv cds-10" style="-webkit-font-smoothing: antialiased; width: calc(100% + 16px); display: flex; flex-wrap: wrap; margin: -8px;"><div class="cds-9 css-1xdhyk6 cds-11 cds-grid-item cds-45" style="-webkit-font-smoothing: antialiased; margin: 0px; flex-grow: 0; max-width: 8.33333%; flex-basis: 8.33333%; padding: 8px;"><svg aria-hidden="true" fill="none" focusable="false" height="20" viewBox="0 0 20 20" width="20" id="cds-react-aria-5" class="css-0"><g clip-path="url(#cds-react-aria-5_0)" fill-rule="evenodd" clip-rule="evenodd" fill="currentColor"><path d="M10 1.5a8.5 8.5 0 100 17 8.5 8.5 0 000-17zM.5 10a9.5 9.5 0 1119 0 9.5 9.5 0 01-19 0z"></path><path d="M14.384 7.32l-5.35 6.42-3.388-3.386.708-.708 2.612 2.613 4.65-5.58.768.641z"></path></g><defs><clipPath id="cds-react-aria-5_0"><path fill="#fff" d="M0 0h20v20H0z"></path></clipPath></defs></svg></div><div class="cds-9 css-0 cds-11 cds-grid-item cds-44" style="-webkit-font-smoothing: antialiased; margin: 0px; flex-grow: 1; max-width: 100%; flex-basis: 0px; padding: 8px;"><div class="cds-119 css-80vnnb cds-121" style="box-sizing: inherit; -webkit-font-smoothing: antialiased; margin: 0px; font: var(--cds-typography-body1); letter-spacing: var(--cds-letter-spacing-body1); color: var(--cds-color-neutral-primary);">Learn from leading academics and industry experts drawn from a range of fields of technology and innovation at the renowned Goldsmiths Computing Research department.</div></div></div></div><div class="rc-IconList css-1mgmp4c" style="box-sizing: inherit; -webkit-font-smoothing: antialiased; width: calc(50% - 32px); display: inline-block; margin-right: var(--cds-spacing-400); padding-top: var(--cds-spacing-300); color: rgb(55, 58, 60); font-family: OpenSans, Arial, sans-serif; font-size: 14px;"><div class="cds-9 css-7avemv cds-10" style="-webkit-font-smoothing: antialiased; width: calc(100% + 16px); display: flex; flex-wrap: wrap; margin: -8px;"><div class="cds-9 css-1xdhyk6 cds-11 cds-grid-item cds-45" style="-webkit-font-smoothing: antialiased; margin: 0px; flex-grow: 0; max-width: 8.33333%; flex-basis: 8.33333%; padding: 8px;"><svg aria-hidden="true" fill="none" focusable="false" height="20" viewBox="0 0 20 20" width="20" id="cds-react-aria-6" class="css-0"><path fill-rule="evenodd" clip-rule="evenodd" d="M.5 3h5.99c1.907 0 2.95.75 3.49 1.583a3.314 3.314 0 01.519 1.575v.034l.001.01v.007l-.5.001h.5V18h-1v0-.012l-.005-.067a2.585 2.585 0 00-.34-1.072c-.324-.547-.988-1.159-2.475-1.159H.5V3zm9 12.683V6.2l-.005-.061a2.315 2.315 0 00-.354-1.013C8.805 4.606 8.094 4 6.49 4H1.5v10.69h5.18c1.345 0 2.239.427 2.82.993z" fill="currentColor"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M10.02 4.583C10.56 3.75 11.602 3 13.51 3h5.99v12.69h-6.18c-1.487 0-2.151.612-2.475 1.16a2.582 2.582 0 00-.345 1.138v.014S10.5 18 10 18h-.5V6.21h.5-.5v-.018a1.53 1.53 0 01.009-.145 3.315 3.315 0 01.51-1.464zm.48 1.63V6.2l.005-.061a2.316 2.316 0 01.354-1.013C11.195 4.606 11.906 4 13.51 4h4.99v10.69h-5.18c-1.345 0-2.239.427-2.82.993v-9.47z" fill="currentColor"></path></svg></div><div class="cds-9 css-0 cds-11 cds-grid-item cds-44" style="-webkit-font-smoothing: antialiased; margin: 0px; flex-grow: 1; max-width: 100%; flex-basis: 0px; padding: 8px;"><div class="cds-119 css-80vnnb cds-121" style="box-sizing: inherit; -webkit-font-smoothing: antialiased; margin: 0px; font: var(--cds-typography-body1); letter-spacing: var(--cds-letter-spacing-body1); color: var(--cds-color-neutral-primary);">Speacialise in 1 of 7 cutting-edge topics: ML and AI, data science, web and mobile development, physical computing and IoT, game development, VR, or UX.</div></div></div></div><div class="rc-IconList css-1mgmp4c" style="box-sizing: inherit; -webkit-font-smoothing: antialiased; width: calc(50% - 32px); display: inline-block; margin-right: var(--cds-spacing-400); padding-top: var(--cds-spacing-300); color: rgb(55, 58, 60); font-family: OpenSans, Arial, sans-serif; font-size: 14px;"><div class="cds-9 css-7avemv cds-10" style="-webkit-font-smoothing: antialiased; width: calc(100% + 16px); display: flex; flex-wrap: wrap; margin: -8px;"><div class="cds-9 css-1xdhyk6 cds-11 cds-grid-item cds-45" style="-webkit-font-smoothing: antialiased; margin: 0px; flex-grow: 0; max-width: 8.33333%; flex-basis: 8.33333%; padding: 8px;"><svg aria-hidden="true" fill="none" focusable="false" height="20" viewBox="0 0 20 20" width="20" id="cds-react-aria-7" class="css-0"><path fill-rule="evenodd" clip-rule="evenodd" d="M.5 4.5h19v13H.5v-13zm1 1v11h17v-11h-17z" fill="currentColor"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M4.5 17V5h1v12h-1zM14.5 17V5h1v12h-1zM8.252 2.87c-.36.296-.752.89-.752 2.13h-1c0-1.47.478-2.376 1.116-2.902A2.646 2.646 0 019.25 1.5h1.5c.328 0 1.017.09 1.634.598C13.022 2.624 13.5 3.529 13.5 5h-1c0-1.24-.392-1.834-.752-2.13a1.649 1.649 0 00-.998-.37h-1.5c-.182 0-.618.056-.998.37z" fill="currentColor"></path></svg></div><div class="cds-9 css-0 cds-11 cds-grid-item cds-44" style="-webkit-font-smoothing: antialiased; margin: 0px; flex-grow: 1; max-width: 100%; flex-basis: 0px; padding: 8px;"><div class="cds-119 css-80vnnb cds-121" style="box-sizing: inherit; -webkit-font-smoothing: antialiased; margin: 0px; font: var(--cds-typography-body1); letter-spacing: var(--cds-letter-spacing-body1); color: var(--cds-color-neutral-primary);">Develop real-life, widely applicable core programming skills, along with transferable soft skills such as project management, presentation skills and teamwork.</div></div></div></div>',
                'speacialist_id' => $faker->numberBetween(1, 7),
                'creator_id' => $faker->randomElement(['2', '3', '4', '5', '6', '7', '8', '9', '10', '11']),
                'duration' => $faker->randomElement(['1', '2', '3']),
                'image' => 'appointment_image.jpg', // Fixed image name for all appointments
                'status' => 1,
            ]);
        }
    }
}
