<?php

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class FilmGenresTableSeeder
 */
class FilmGenresTableSeeder extends Seeder {

    /**
     *
     */
    public function run() {

        if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        DB::table('film_genres')->truncate();

        $types = [
            [
                'id' => 1,
                'film_id' => 1,
                'genre_id' => 1,
            ],
            [
                'id' => 2,
                'film_id' => 1,
                'genre_id' => 3,
            ],
            [
                'id' => 3,
                'film_id' => 1,
                'genre_id' => 6,
            ],
            [
                'id' => 4,
                'film_id' => 2,
                'genre_id' => 2,
            ],
            [
                'id' => 5,
                'film_id' => 2,
                'genre_id' => 4,
            ],
            [
                'id' => 6,
                'film_id' => 2,
                'genre_id' => 5,
            ],
            [
                'id' => 7,
                'film_id' => 3,
                'genre_id' => 3,
            ],
        ];

        DB::table('film_genres')->insert($types);

        if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}