<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Topic;
use App\Models\Lesson;
use App\Models\LessonDetail;

class HomeAdmin extends Controller
{
    public function index()
    {
        $sumuser = User::all()->count();
        $sumTopic = Topic::all()->count();
        $sumLesson = Lesson::all()->count();
        $sumWord = LessonDetail::all()->count();

        return view('admin.index.index', compact('sumuser', 'sumTopic', 'sumLesson', 'sumWord'));
    }
}
