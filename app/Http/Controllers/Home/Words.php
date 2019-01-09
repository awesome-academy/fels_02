<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Topic;
use App\Models\Lesson;
use App\Models\LessonDetail;
use App\Models\WordRemember;
use Illuminate\Support\Facades\Auth;

class Words extends Controller
{
    public function index()
    {
        $displayTopics = Topic::get();
        $displayLessons = Lesson::get();
        $wordRemember = WordRemember::pluck('word_remember_id', 'word_id')->toArray();
        $words = LessonDetail::paginate(config('setting.wordsPaginate'));
        $countWords = LessonDetail::count();

        if (Auth::check()) {
            $user_id = Auth::user()->user_id;

            $countSaved = WordRemember::where('user_id', $user_id)->count();
        } else {
            $countSaved = config('setting.savedDefault');
        }
        
        return view('home.word.index', compact('displayTopics', 'displayLessons', 'words', 'countWords', 'countSaved', 'wordRemember', 'aaa'));
    }

    public function wordRemember(Request $request)
    {
        $saveWord = new WordRemember;
        $user_id = Auth::user()->user_id;
        $word_id = $request->wordid;
        $wordRemember = WordRemember::pluck('word_remember_id', 'word_id')->toArray();

        if (array_key_exists($word_id, $wordRemember)) {
            WordRemember::where([
                            ['user_id', $user_id],
                            ['word_id', $word_id],
                        ])->delete();

            return view('home.word.ajaxSaveWord', compact('word_id', 'wordRemember'));
        } else {
            $saveWord->user_id = $user_id;
            $saveWord->word_id = $word_id;

            $saveWord->save();

            return view('home.word.ajaxSaveWord', compact('word_id', 'wordRemember'));
        }
    }
}
