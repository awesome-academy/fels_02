<?php

use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('topic')->insert([
        	'topic_name' => 'Động vật',
        	'preview' => 'Các từ vựng về động vật',
        	'picture' => 'animal.jpg',
        	'parent_id' => 0,
        ]);
    }
}
