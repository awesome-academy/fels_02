<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Topic;
use App\Models\Lesson;
use App\Models\LessonDetail;

class Home extends Controller
{
	public function index()
	{
		$displayTopics = Topic::get();
        $displayLessons = Lesson::get();

        $displayWordToday = LessonDetail::inRandomOrder()->limit(config('setting.number_limit'))->get();
		$displayTopicToday = Topic::inRandomOrder()->limit(config('setting.number_limit'))->get();

    	return view('home.index.index', compact('displayTopics', 'displayLessons', 'displayWordToday', 'displayTopicToday', 'displayWord'));
	}
}
