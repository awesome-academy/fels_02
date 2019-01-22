<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Topic;
use App\Models\Lesson;
use App\Models\UserTopic;

class UserProgress extends Controller
{
    public function index()
    {
        $displayTopics = Topic::get();
        $displayLessons = Lesson::get();

        $user_id = Auth::user()->user_id;
        $user_progress = UserTopic::select('usertopic.usertopic_id', 'topic.topic_name', 'usertopic.progress')->join('topic', 'topic.topic_id', '=', 'usertopic.topic_id')->where('user_id', $user_id)->get();
        $user_progressJson = $user_progress->toJson();
        
        return view('home.progress.index', compact('displayTopics', 'displayLessons', 'user_progress', 'user_progressJson'));
    }
}
