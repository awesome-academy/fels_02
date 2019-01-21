<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Topic;
use App\Models\Lesson;
use Illuminate\Support\Facades\DB;

class LessonManager extends Controller
{
    public function index()
    {
        $topic = Topic::pluck('topic_name', 'topic_id');
        $displayLesson = DB::table('lesson as ls')->select('ls.lesson_name', 'ls.lesson_id', 'ls.picture as picturels', 'ls.preview', 'tp.topic_name', 'tp.topic_id')->join('topic as tp', 'tp.topic_id', '=', 'ls.topic_id')->paginate(10);

        return view('admin.lesson.index', compact('displayLesson', 'topic'));
    }

    public function create()
    {
        $topic = Topic::pluck('topic_name', 'topic_id');

        return view('admin.lesson.add', compact('topic'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        if(isset($input['picture']))
        {
            $file = $input['picture'];
            $fileex = $input['picture']->getClientOriginalExtension();
            $namenew = 'Lesson-'.time().'.'.$fileex;
            $path = public_path(config('setting.file_save_lesson'));
            $input['picture'] = $namenew;
            $file->move($path, $namenew);
        }
        $check_create_success = Lesson::create($input);
        if ($check_create_success)
        {

            return redirect()->route('adminlesson.index')->with('adminmessage', trans('adminMess.createsuccessfull'));
        }
        else 
        {

            return redirect()->back()->with('adminmessage', trans('adminMess.createfail'))->withInput();
        }
    }

    public function  update(Request $request,$id) {
        $input = $request->all();
        if(isset($input['picture']))
        {
            $file = $input['picture'];
            $fileex = $input['picture']->getClientOriginalExtension();
            $namenew = 'Lesson-'.time().'.'.$fileex;
            $path = public_path(config('setting.file_save_lesson'));
            $input['picture'] = $namenew;
            $file->move($path, $namenew);
        }
        $check_update_success = Lesson::find($id)->update($input);
        if ($check_update_success)
        {

            return redirect()->route('adminlesson.index')->with('adminmessage', trans('adminMess.updatesucceslesson'));
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
            $lesson = Lesson::findOrFail($id);
            $lesson->delete();

            return redirect()->route('adminlesson.index')->with('messageD', trans('adminMess.message-del-success'));
        }
        catch (Exception $exception) 
        {

            return redirect()->back()->with('messageD', trans('adminMess.message-del-fail'));
        }
    }
}
