<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Lesson;
use App\Models\TestLesson;
use Illuminate\Notifications\Notifiable;
use App\Notifications\FinishTest;
use Mail;

class cronEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send unfinished topic';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $testUnfinishs = TestLesson::select('user_id', 'lesson_id')->where('status', config('setting.default'))->get();
        if (count($testUnfinishs) > config('setting.default')) {
            foreach ($testUnfinishs as $key => $test) {
                $user = User::where('user_id', $test->user_id)->first();
                $lesson = Lesson::select('lesson_id', 'lesson_name')->where('lesson_id', $test->lesson_id)->first();
                \Notification::send($user, new FinishTest($lesson));
            }
        }
    }
}
