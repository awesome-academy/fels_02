<?php

use Illuminate\Database\Seeder;

class TestLessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('test_lesson')->insert([
        	'exam_name' => 'Bài kiểm tra 1',
        	'user_id' => 1,
        	'lesson_id' => 1,
        	'sum_correct_answer' => 3,
        	'status' => 0,
        ]);
    }
}
