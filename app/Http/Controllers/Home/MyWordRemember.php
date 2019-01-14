<?php

namespace App\Http\Controllers\Home;

use App\Models\LessonDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WordRemember;
use App\Models\Topic;
use App\Models\Lesson;
use Illuminate\Support\Facades\DB;

class MyWordRemember extends Controller
{
    public function show($id){
        $displayTopics = Topic::get();
        $displayLessons = Lesson::get();
        $wordRemeber = DB::table('word_remember as wd')->join('lesson_detail as ld', 'wd.word_id' , '=', 'ld.word_id')->where('user_id', $id)->get();
        $sum = DB::table('word_remember')->where('user_id', $id)->count();
        return view('home.wordfollow.index', compact('displayTopics', 'displayLessons', 'wordRemeber', 'sum'));
    }
}
