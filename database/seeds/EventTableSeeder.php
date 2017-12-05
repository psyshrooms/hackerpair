<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

use App\Event;
use App\User;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('events')->truncate();

        $users = User::all();

        $faker = \Faker\Factory::create();

        foreach(range(1,50) as $index)
        {

            $user = $users->random();

            Event::create([
                'user_id'       => $user->id,
                'name'          => $faker->sentence(2),
                'published'     => rand(0,1),
                'started_at'    => $faker->dateTimeBetween('now', '+10 days'),
                'max_attendees' => rand(2,5),
                'city'          => $faker->city,
                'zip'           => $faker->postcode,
                'venue'         => $faker->company,
                'description'   => $faker->paragraphs(1, true),
            ]);

        }

    }
}