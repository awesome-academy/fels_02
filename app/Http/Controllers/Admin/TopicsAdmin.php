<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddTopicRequest;
use App\Http\Requests\EditTopicRequest;
use App\Notifications\CreateTopic;
use App\Mail\AdminMailer;
use App\Models\Topic;
use App\Models\User;
use Mail;
use File;

class TopicsAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::paginate(config('setting.number_topicAdminPaginate'));

        return view('admin.topic.index', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.topic.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddTopicRequest $request, Topic $topic)
    {
        $users = User::select('email')->where('role_id', '!=', config('setting.numberDefault1'))->get();
        $userByRole = User::where('role_id', '!=', config('setting.numberDefault1'))->get();
        $topic->topic_name = $request->name;
        $topic->preview = $request->preview;
        $picture = $request->file('picture');
        $time = time();
        $end_file = $picture->getClientOriginalExtension();
        $file_name = 'Topic-'.$time.'.'.$end_file;
        $topic->picture = $file_name;
        $picture->move(config('setting.folder_topic_img'), $file_name);
        $resultAdd = $topic->save();

        foreach ($userByRole as $key) {
            $key->notify(new CreateTopic($topic));
        }
        
        if($resultAdd) {

            return redirect()->route('topic-admin.index')->with('msg', trans('adminMess.msg_addSuccess'));
        } else {

            return redirect()->route('topic-admin.create')->with('msg', trans('adminMess.msg_addFail'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        try 
        {
            $topic = Topic::findOrFail($id);

            return view('admin.topic.edit', compact('topic'));
        }
        catch (Exception $exception) 
        {

            return redirect()->back()->with('msgFail', trans('adminMess.messFindFail'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditTopicRequest $request, $id)
    {
        $topic = Topic::find($id);
        $topic->topic_name = $request->name;
        $topic->preview = $request->preview;

        if ($request->file('picture') == null) {
            $resultEdit = $topic->save();
        } else {
            File::delete(config('setting.folder_topic_img').'/'.$topic->picture);

            $picture = $request->file('picture');
            $time = time();
            $end_file = $picture->getClientOriginalExtension();
            $file_name = 'Topic-'.$time.'.'.$end_file;
            $topic->picture = $file_name;
            $picture->move(config('setting.folder_topic_img'), $file_name);

            $resultEdit = $topic->save();
        }

        if($resultEdit) {

            return redirect()->route('topic-admin.index')->with('msg', trans('adminMess.msg_editSuccess'));
        } else {

            return redirect()->route('topic-admin.edit')->with('msg', trans('adminMess.msg_editFail'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $topic = Topic::find($id);
        $resultDel = $topic->delete($id);
        File::delete(config('setting.folder_topic_img').'/'.$topic->picture);

        if($resultDel) {

            return redirect()->route('topic-admin.index')->with('msg', trans('adminMess.msg_delSuccess'));
        } else {
            
            return redirect()->route('topic-admin.index')->with('msg', trans('adminMess.msg_delFail'));
        }
    }
}
