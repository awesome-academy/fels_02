<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Topic;
use App\Models\Lesson;
use App\Models\LessonDetail;
use Illuminate\Support\Facades\Auth;

class TestLesson extends Controller
{
    public function show($id)
    {
        $displayTopics = Topic::get();
        $displayLessons = Lesson::get();

        $lesson = Lesson::where('lesson_id', $id)->first();
        $topic = Topic::where('topic_id', $lesson->topic_id)->first();
        $lessons = Lesson::where('topic_id', $topic->topic_id)->get();
        $words = LessonDetail::where('lesson_id', $lesson->lesson_id)->get();
        return view('home.lesson.testLesson', compact('displayTopics', 'displayLessons', 'lesson', 'lessons', 'topic', 'words'));
    }

    public function testLesson(Request $request, $id)
    {
        $user_id = Auth::user()->user_id;
        $lesson = Lesson::where('lesson_id', $id)->first();
        $topic_id = $lesson->topic_id;
        $words = LessonDetail::where('lesson_id', $lesson->lesson_id)->get();
        $countWord = LessonDetail::where('lesson_id', $lesson->lesson_id)->count();
        $count = 0;
        foreach ($words as $key => $word) {
            $word_name = 'word'.$word->word_id;
            if ($request->$word_name === $word->word_name) {
                $count += 1;
            }
        }
        $percent = ($count / $countWord) * 100;
        if ($percent >= 70 ) {
            return redirect()->route('lesson.show', $topic_id)->with('msgTestSuccess', trans('messages.testSuccess'));
        } else {
            return redirect()->back()->with('msgTestFail', trans('messages.testFail'));
        }

    }
}
