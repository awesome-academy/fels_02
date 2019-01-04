<?php

use Illuminate\Database\Seeder;

class HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('history')->insert([
        	'user_id' => 1,
        	'lesson_id' => 1,
        	'content' => 'Đang theo dõi Bài 1',
        ]);
    }
}
