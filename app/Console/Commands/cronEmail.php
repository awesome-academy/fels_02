<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Notifications\MailEndTest;
use App\Models\User;
class cronEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:mail';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Mail Every 5 minutes';
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
        $arr = DB::table("test_lesson")->where("status", 0)->get();
        if($arr->count() > 0){
            foreach ($arr as $ar) {
                $user = User::where("user_id", $ar->user_id)->first();
                $arrLesson = DB::table("lesson")->where("lesson_id", $ar->lesson_id)->first();
                Notification::send($user, new MailEndTest($arrLesson));
            }
        }
    }
}
