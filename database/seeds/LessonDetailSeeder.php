<?php

use Illuminate\Database\Seeder;

class LessonDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lesson_detail')->insert([
        	'word_name' => 'chicken',
        	'picture' => 'chicken.jpeg',
            'sound' => '',
        	'word_type' => '(n)',
        	'translate' => 'con gà',
        	'lesson_id' => '1',
        ]);
    }
}
