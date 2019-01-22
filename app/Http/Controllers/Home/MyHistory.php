<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Topic;
use App\Models\Lesson;
use App\Models\History;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MyHistory extends Controller
{
    public function index()
    {
        $displayTopics = Topic::get();
        $displayLessons = Lesson::get();
        $history = DB::table("history as ht")->select("ht.*", "ls.lesson_name")->join("lesson as ls", "ls.lesson_id", "=", "ht.lesson_id")
            ->where("user_id", Auth::user()->user_id)->orderBy("created_at", "DESC")->get();
        return view('home.history.index', compact('displayTopics', 'displayLessons', 'history'));
    }
}
