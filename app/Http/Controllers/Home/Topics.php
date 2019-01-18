<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Topic;
use App\Models\Lesson;
use Illuminate\Support\Facades\DB;

class Topics extends Controller
{
    public function index()
    {
        $displayTopics = Topic::get();
        $displayLessons = Lesson::get();
        $topicPaginate = DB::table('usertopic as utp')->join('topic as tp','tp.topic_id','=','utp.topic_id')->select('tp.topic_name','tp.picture','tp.topic_id','tp.preview','utp.progress')->get();

        return view('home.topic.index', compact('displayLessons', 'displayTopics', 'topicPaginate'));
    }
}
