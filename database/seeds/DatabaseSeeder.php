<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(TopicSeeder::class);
        $this->call(LessonSeeder::class);
        $this->call(LessonDetailSeeder::class);
        $this->call(WordRememberSeeder::class);
        $this->call(HistorySeeder::class);
        $this->call(TestLessonSeeder::class);
    }
}
