<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

/**
 * Class PostingDatabaseSeeder
 */
class PostingDatabaseSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $now = new \DateTime;

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('posting_types')->truncate();
        DB::table('postings')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        DB::table('posting_types')->insert(
            [
                'type' => 'posting',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        );
        DB::table('posting_types')->insert(
            [
                'type' => 'share',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        );
        DB::table('posting_types')->insert(
            [
                'type' => 'image',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        );
        DB::table('posting_types')->insert(
            [
                'type' => 'video',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        );

        for($i=0;$i<10;$i++) {

            $posting_user_id = rand(1,10);
            $posting_type_id = rand(1,4);
            $share_user_id = $posting_user_id;
            $url = null;

            if($posting_type_id == 2) {
                while($share_user_id == $posting_user_id) {
                    $share_user_id = rand(1,1000);
                }
            }

            if($posting_type_id == 3) {
                $url = $faker->imageUrl(640,480);
            }

            if($posting_type_id == 4) {
                $url = '';
            }

            DB::table('postings')->insert([
                'posting_user_id' => $posting_user_id,
                'posting_type_id' => $posting_type_id,
                'posting_content' => $faker->text(),
                'share_user_id' => $share_user_id,
                'url' => $url,
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }
    }
}