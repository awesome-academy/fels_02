<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Topic;
use App\Models\Lesson;
use App\Models\LessonDetail;

class DetailLesson extends Controller
{
    public function show($id)
    {
        $displayTopics = Topic::get();
        $displayLessons = Lesson::get();
        $namelesson = Lesson::where('lesson_id', $id)->first();
        $nametopic = Topic::where('topic_id', $namelesson->topic_id)->first();
        $LessonDetail = LessonDetail::where('lesson_id', $id)->get();

        return view('home.lessondetail.index', compact('displayTopics', 'displayLessons', 'LessonDetail', 'nametopic', 'namelesson'));
    }
}
