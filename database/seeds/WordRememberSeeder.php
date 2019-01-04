<?php

use Illuminate\Database\Seeder;

class WordRememberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('word_remember')->insert([
        	'user_id' => 1,
        	'word_id' => 1,
        	'status' => 0,
        	'follow' => 0,
        ]);
    }
}
