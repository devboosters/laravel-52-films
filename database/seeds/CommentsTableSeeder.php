<?php

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class CommentsTableSeeder
 */
class CommentsTableSeeder extends Seeder {

    /**
     *
     */
    public function run() {

        if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        DB::table('comments')->truncate();

        $types = [
            [
                'id' => 1,
                'name' => 'Naeem Choudhary',
                'comment' => 'Naeem Choudhary is expecting that it looks I am a test comment.Naeem Choudhary is expecting that it looks I am a test comment.Naeem Choudhary is expecting that it looks I am a test comment.',
                'film_id' => 1,
                'user_id' => 3,
            ],
            [
                'id' => 2,
                'name' => 'CodeLine Comments',
                'comment' => 'CodeLine Comments is expecting that it looks I am a test comment.CodeLine Comments is expecting that it looks I am a test comment.CodeLine Comments is expecting that it looks I am a test comment.',
                'film_id' => 2,
                'user_id' => 3,
            ],
            [
                'id' => 3,
                'name' => 'Chris Sevilleja',
                'comment' => 'Chris Sevilleja is expecting that it looks I am a test comment.Chris Sevilleja is expecting that it looks I am a test comment.Chris Sevilleja is expecting that it looks I am a test comment.',
                'film_id' => 3,
                'user_id' => 3,
            ],
        ];

        DB::table('comments')->insert($types);

        if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}