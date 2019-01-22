<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Topic;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateProfile;

class MyProfile extends Controller
{
    public function index()
    {
        $displayTopics = Topic::get();
        $displayLessons = Lesson::get();

        return view('home.user.myprofile', compact('displayTopics', 'displayLessons'));
    }

    public function show()
    {

        return view('home.user.loadform');
    }

    public function update(Request $request,$id){
        $input = $request->all();
        if(isset($input['avatar']))
        {
            $file = $input['avatar'];
            $fileex = $input['avatar']->getClientOriginalExtension();
            $namenew = 'user-'.time().'.'.$fileex;
            $path = public_path(config('setting.file_save_avatar'));
            $input['avatar'] = $namenew;
            $file->move($path, $namenew);
        }
        $user = User::find(Auth::user()->user_id)->update($input);

        return redirect()->route('profile.index')->with('update', trans('messages.updatesucces'));
    }
}
