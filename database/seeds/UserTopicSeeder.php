<?php

use Illuminate\Database\Seeder;

class UserTopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usertopic')->insert([
            'topic_id' => '1',
            'user_id' => '1',
            'progress' => '0/20',
        ]);
    }
}
