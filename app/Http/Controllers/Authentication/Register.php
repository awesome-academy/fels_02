<?php

namespace App\Http\Controllers\Authentication;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Topic;
use App\Models\Lesson;
use App\Models\User;

class Register extends Controller
{
    public function index()
    {
        $displayTopics = Topic::get();
        $displayLessons = Lesson::get();

        return view('auth.register', compact('displayTopics', 'displayLessons'));
    }

    public function store(RegisterRequest $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        User::create($input);

        if (Auth::attempt($request->only('username', 'password')))
        {

            return redirect()->route('home')->with('messagecreate', trans('auth.createsuccessfull'));
        }

        return redirect()->back()->with('messagecreate', trans('auth.createfail'))->withInput();
    }
}
