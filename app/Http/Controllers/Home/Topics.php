<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Topic;
use App\Models\Lesson;

class Topics extends Controller
{
    public function index()
    {
        $displayTopics = Topic::get();
        $displayLessons = Lesson::get();

        $topicPaginate = Topic::paginate(config('setting.number_topicPaginate'));

        return view('home.topic.index', compact('displayLessons', 'displayTopics', 'topicPaginate'));
    }
}
