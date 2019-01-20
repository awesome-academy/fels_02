<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TestLesson;
use Illuminate\Support\Facades\DB;

class Charts extends Controller
{
    public function index()
    {
        $range = \Carbon\Carbon::now()->subDays(1);
        $sumtest = TestLesson::select(DB::raw('DATE_FORMAT(created_at,"%d-%m-%Y") as x'), DB::raw('COUNT(*) as value'))
                ->where('created_at', '<=', $range)
                ->whereMonth('created_at', '=', date("n"))
                ->whereYear('created_at', '=', date("Y"))
                ->groupBy('x')
                ->orderBy('x', 'ASC')
                ->get()->toJson();
        return view('admin.chart.index', compact('sumtest'));
    }
}
