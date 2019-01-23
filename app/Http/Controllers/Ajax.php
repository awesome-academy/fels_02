<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Ajax extends Controller
{
    public function ajaxUsername(){
        $user = User::all();

        return response()->json($user);
    }
}
