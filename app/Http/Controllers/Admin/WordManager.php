<?php

namespace App\Http\Controllers\Admin;

use App\Models\LessonDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Topic;
use App\Models\Lesson;
use Illuminate\Support\Facades\DB;

class WordManager extends Controller
{
    public function index()
    {
        $lesson = Lesson::pluck('lesson_name', 'lesson_id');
        $word = DB::table('lesson_detail as wd')->select('wd.word_name', 'wd.word_id', 'wd.picture as picturewd', 'wd.spelling', 'wd.translate', 'wd.sound', 'ls.lesson_name', 'ls.lesson_id')->join('lesson as ls', 'ls.lesson_id', '=', 'wd.lesson_id')->get();

        return view('admin.word.index', compact('word', 'lesson'));
    }

    public function create()
    {
        $lesson = Lesson::pluck('lesson_name', 'lesson_id');

        return view('admin.word.add', compact('lesson'));
    }

    public function save_picture($input){
        if(isset($input['picture']))
        {
            $file = $input['picture'];
            $fileex = $input['picture']->getClientOriginalExtension();
            $namenew = 'word-'.time().'.'.$fileex;
            $path = public_path(config('setting.word_file_path'));
            $input['picture'] = $namenew;
            $file->move($path, $namenew);

            return $namenew;
        }
    }

    public function save_sound($input){
        if(isset($input['sound']))
        {
            $file = $input['sound'];
            $fileex = $input['sound']->getClientOriginalExtension();
            $namenew = 'audio-'.time().'.'.$fileex;
            $path = public_path(config('setting.word_file_audio_path'));
            $input['sound'] = $namenew;
            $file->move($path, $namenew);

            return $namenew;
        }

    }
    public function store(Request $request)
    {
        $input = $request->all();
        $input['picture'] = $this->save_picture($input);
        $input['sound'] = $this->save_sound($input);
        $check_create_success = LessonDetail::create($input);
        if ( $check_create_success)
        {

            return redirect()->route('adminword.index')->with('adminmessage', trans('adminMess.creatsuccesword'));
        }
        else 
        {

            return redirect()->back()->with('adminmessage', trans('adminMess.createfail'))->withInput();
        }
    }

    public function  update(Request $request,$id)
    {
        $input = $request->all();
        $input['picture'] = $this->save_picture($input);
        $input['sound'] = $this->save_sound($input);
        $check_update_success = LessonDetail::find($id)->update($input);
        if ( $check_update_success)
        {

            return redirect()->route('adminword.index')->with('adminmessage', trans('adminMess.updatesuccesword'));
        }
        else 
        {

            return redirect()->back()->with('adminmessage', trans('adminMess.updatefaillesson'))->withInput();
        }
    }

    public function destroy($id)
    {
        try
        {
            $LessonDetail = LessonDetail::findOrFail($id);
            File::delete(config('setting.word_file_path').$LessonDetail->picture);
            File::delete(config('setting.word_file_audio_path').$LessonDetail->audio);
            $LessonDetail->delete();

            return redirect()->route('adminword.index')->with('messageD', trans('adminMess.message-del-success'));
        }
        catch (Exception $exception)
        {

            return redirect()->back()->with('messageD', trans('adminMess.message-del-fail'));
        }
    }
}
