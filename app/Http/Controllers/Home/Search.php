<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Topic;
use App\Models\Lesson;
use App\Models\LessonDetail;

class Search extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        $displayLessons = Lesson::get();
        $displayTopics = Topic::get();
        
        $keySearch = $request->search;
        $getWord = LessonDetail::where('word_name', 'like', "%$keySearch%")->first();

        return view('home.search.index', compact('displayTopics', 'displayLessons', 'getWord'));
    }
}
