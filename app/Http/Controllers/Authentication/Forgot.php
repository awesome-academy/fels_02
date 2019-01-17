<?php

namespace App\Http\Controllers\Authentication;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Models\Topic;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Forgot extends Controller
{
    public function index()
    {
        $displayTopics = Topic::get();
        $displayLessons = Lesson::get();

        return view('auth.forgot', compact('displayTopics', 'displayLessons'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $newpass = str_random(8);
        $passbcrypt = bcrypt($newpass);
        $check = User::where('email', '=', $input["email"])->where("username", "=", $input["username"])->first();
        if($check == null){
            return redirect()->back()->with('messagelogin', trans('messages.check_mail_fail'))->withInput();
        }
        else
        {
            DB::table('users')->where('email', '=', $input["email"])->where("username", "=", $input["username"])->update(["password" => $passbcrypt]);
            Mail::send('auth.mailfb', array('username'=>$input["username"], 'email'=>$input["email"], 'newpass' => $newpass), function($message) use ($input){
                $message->to($input["email"], 'User')->subject(trans('messages.get_new_pass'));
            });

            return redirect()->route('home.index')->with('messagelogin', trans('messages.check_mail_success'));
        }
    }
}
