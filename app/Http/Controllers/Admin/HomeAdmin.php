<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeAdmin extends Controller
{
    public function index()
    {
        return view('admin.index.index');
    }
}
