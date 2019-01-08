<?php

namespace App\Http\Controllers\Authentication;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\LoginRequest;
use App\Models\Topic;
use App\Models\Lesson;
class Login extends Controller
{
    public function index()
    {
        $displayTopics = Topic::get();
        $displayLessons = Lesson::get();

        return view('auth.login', compact('displayTopics', 'displayLessons'));
    }

    public function store(LoginRequest $request)
    {
        $login = [
            'username' => $request->log_username,
            'password' => $request->log_password,
        ];

        if(Auth::attempt($login))
        {
            if(auth()->user()->role_id == config('setting.user'))
            {

                return redirect()->route('home.index');
            }
        }
        else
        {
                
            return redirect()->back()->with('messagelogin', trans('auth.loginfail'))->withInput();
        }
    }
}
