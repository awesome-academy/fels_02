<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Topic;
use App\Models\Lesson;
use Illuminate\Support\Facades\DB;
use App\Models\WordRemember;
use function MongoDB\BSON\toJSON;

class Statistical extends Controller
{
    public function index()
    {
        $displayTopics = Topic::get();
        $displayLessons = Lesson::get();
        $range = \Carbon\Carbon::now()->subDays(config('setting.numberMonth'));
        $range1 = \Carbon\Carbon::now()->subDays(config('setting.numberDay'));
        $sum_year = WordRemember::where('created_at', '<=', $range)
            ->whereYear('created_at', '=', date("Y"))
            ->count();
        $sum_month = WordRemember::where('created_at', '<=', $range1)
            ->whereMonth('created_at', '=', date("n"))
            ->whereYear('created_at', '=', date("Y"))
            ->count();

        return view('home.statistical.index', compact('displayTopics', 'displayLessons', 'sum_month', 'sum_year'));
    }

    public  function test($key){
        if($key == 1)
        {
            $range = \Carbon\Carbon::now()->subDays(config('setting.number_month_sub'));
            $stats = WordRemember::select(DB::raw('month(created_at) as day'), DB::raw('COUNT(*) as value'))
                ->where('created_at', '<=', $range)
                ->whereYear('created_at', '=', date("Y"))
                ->groupBy('day')
                ->orderBy('day', 'ASC')
                ->get();
        }
        else 
        {
            $range = \Carbon\Carbon::now()->subDays(config('setting.number_day_sub'));
            $stats = WordRemember::select(DB::raw('DATE_FORMAT(created_at,"%d-%m-%Y") as day'), DB::raw('COUNT(*) as value'))
                ->where('created_at', '<=', $range)
                ->whereMonth('created_at', '=', date("n"))
                ->whereYear('created_at', '=', date("Y"))
                ->groupBy('day')
                ->orderBy('day', 'ASC')
                ->get();
        }
        
        return $stats;
    }
}
