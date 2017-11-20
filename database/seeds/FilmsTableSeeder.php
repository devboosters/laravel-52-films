<?php

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class FilmsTableSeeder
 */
class FilmsTableSeeder extends Seeder {

    /**
     *
     */
    public function run() {

        if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        DB::table('films')->truncate();

        $types = [
            [
                'id' => 1,
                'name' => 'Murder on the Orient Express',
                'slug' => 'murder-on-the-orient-express',
                'description' => 'When a murder occurs on the train he’s travelling on, celebrated detective Hercule Poirot is recruited to solve the case.',
                'release_date' => '2017-11-10',
                'rating' => 4,
                'ticket_price' => 10,
                'country' => 'UK',
                'photo' => 'murder.jpg',
                'user_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'name' => 'Justice League',
                'slug' => 'justice-league',
                'description' => 'Fueled by his restored faith in humanity and inspired by Superman’s selfless act, Bruce Wayne enlists the help of his newfound ally, Diana Prince, to face an even greater enemy.',
                'release_date' => '2017-11-17',
                'rating' => 3,
                'ticket_price' => 96,
                'country' => 'UK',
                'photo' => 'justise_league.jpg',
                'user_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'name' => 'Wonder',
                'slug' => 'wonder',
                'description' => 'Based on the New York Times bestseller, WONDER tells the incredibly inspiring and heartwarming story of August Pullman, a boy with facial differences who enters fifth grade, attending a mainstream elementary school for the first time.',
                'release_date' => '2017-11-17',
                'rating' => 5,
                'ticket_price' => 27,
                'country' => 'US',
                'photo' => 'wonder.jpg',
                'user_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('films')->insert($types);

        if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}