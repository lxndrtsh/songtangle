<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\State;

/**
 * Class MemberDatabaseSeeder
 */
class MemberDatabaseSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $state = new State;
        $states = $state->states();
        $now = new \DateTime;

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('users')->truncate();
        DB::table('user_profile')->truncate();
        DB::table('user_basic_information')->truncate();
        DB::table('user_settings')->truncate();
        DB::table('password_resets')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        for($i=0;$i<10;$i++) {
            DB::table('users')->insert([
                'alias' => $faker->unique()->userName,
                'email' => $faker->unique()->email,
                'password' => bcrypt('TestAccountsPleaseIgnore'),
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }

        $users = DB::table('users')->get();

        foreach($users as $user)
        {
            DB::table('user_profile')->insert([
                'user_id' => $user->id,
                'about' => '',
                'past' => '',
                'present' => '',
                'future' => '',
                'created_at' => $now,
                'updated_at' => $now
            ]);

            $gender = ((100 / 2) > rand(0,100)) ? 'Male' : 'Female';

            DB::table('user_basic_information')->insert([
                'user_id' => $user->id,
                'firstname' => ($gender == 'Male') ? $faker->firstName('male') : $faker->firstName('female'),
                'lastname' => ($gender == 'Male') ? $faker->lastName('male') : $faker->lastName('female'),
                'date_of_birth' => $faker->dateTime,
                'gender' => $gender,
                'address' => $faker->streetAddress,
                'address_2' => $faker->buildingNumber,
                'city' => $faker->city,
                'state' => $states[$faker->stateAbbr],
                'zip_code' => $faker->postcode,
                'phone_number' => $faker->phoneNumber,
                'created_at' => $now,
                'updated_at' => $now
            ]);

            DB::table('user_settings')->insert([
                'user_id' => $user->id,
                'allow_friend_requests' => ((100 / 2) > rand(0,100)) ? 1 : 0,
                'allow_band_requests' => ((100 / 2) > rand(0,100)) ? 1 : 0,
                'allow_view_age' => ((100 / 2) > rand(0,100)) ? 1 : 0,
                'allow_view_gender' => ((100 / 2) > rand(0,100)) ? 1 : 0,
                'allow_view_email' => ((100 / 2) > rand(0,100)) ? 1 : 0,
                'allow_view_phone' => ((100 / 2) > rand(0,100)) ? 1 : 0,
                'allow_view_profile' => ((100 / 2) > rand(0,100)) ? 1 : 0,
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }

    }
}