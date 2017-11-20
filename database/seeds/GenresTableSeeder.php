<?php

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class GenresTableSeeder
 */
class GenresTableSeeder extends Seeder {

    /**
     *
     */
    public function run() {

        if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        DB::table('genres')->truncate();

        $types = [
            [
                'id' => 1,
                'name' => 'crime',
                'display_name' => 'Crime',
            ],
            [
                'id' => 2,
                'name' => 'action',
                'display_name' => 'Action',
            ],
            [
                'id' => 3,
                'name' => 'drama',
                'display_name' => 'Drama',
            ],
            [
                'id' => 4,
                'name' => 'adventure',
                'display_name' => 'Adventure',
            ],
            [
                'id' => 5,
                'name' => 'fantasy',
                'display_name' => 'Fantasy',
            ],
            [
                'id' => 6,
                'name' => 'mystry',
                'display_name' => 'Mystry',
            ]
        ];

        DB::table('genres')->insert($types);

        if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}