<?php

namespace App\Http\Controllers\Lang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class Languages extends Controller
{
    public function index(Request $request)
    {
        Session::put('locale', $request->locale);
        
        return redirect()->back();
    }
}
