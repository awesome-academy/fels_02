<?php

use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lesson')->insert([
        	'lesson_name' => 'Bài 1',
        	'topic_id' => '1',
        ]);
    }
}
