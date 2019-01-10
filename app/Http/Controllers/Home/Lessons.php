<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Topic;
use App\Models\Lesson;

class Lessons extends Controller
{
    public function show($topic_id)
    {
        $displayLessons = Lesson::get();
        $displayTopics = Topic::get();
        $topic = Topic::find($topic_id);
        $resultLesson = Lesson::where('topic_id', $topic_id)->paginate(config('setting.number_lessonPaginate'));

        return view('home.lesson.index', compact('displayTopics', 'displayLessons', 'resultLesson', 'topic'));
    }
}
