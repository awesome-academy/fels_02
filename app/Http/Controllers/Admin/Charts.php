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
        $sumtest = DB::table('test_lesson')->select(DB::raw('DATE_FORMAT(created_at,"%d-%m-%Y") as x'), DB::raw('COUNT(*) as value'))
                ->where('created_at', '<=', $range)
                ->whereMonth('created_at', '=', date("n"))
                ->whereYear('created_at', '=', date("Y"))
                ->groupBy('x')
                ->orderBy('x', 'ASC')
                ->get()->toJson();
        return view('admin.chart.index', compact('sumtest'));
    }

    public function pieChart()
    {
        $range = \Carbon\Carbon::now()->subDays(1);
        $sumTopic = DB::table('usertopic')->select(DB::raw('COUNT(*) as allTopic'))
                ->where('created_at', '<=', $range)
                ->whereMonth('created_at', '=', date("n"))
                ->whereYear('created_at', '=', date("Y"))
                ->first();
        $percentTopicInteger = round(100 / $sumTopic->allTopic);
        $groupTopic = DB::table('usertopic')
                ->join('topic', 'topic.topic_id', '=', 'usertopic.topic_id')
                ->select('topic.topic_name as name', DB::raw("COUNT(*)*$percentTopicInteger as y"), 'usertopic.topic_id as drilldown')
                ->where('usertopic.created_at', '<=', $range)
                ->whereMonth('usertopic.created_at', '=', date("n"))
                ->whereYear('usertopic.created_at', '=', date("Y"))
                ->groupBy('usertopic.topic_id')
                ->get();
        $sumTestLesson = DB::table('test_lesson')->select(DB::raw('COUNT(*) as allTestLesson'))
                ->where('created_at', '<=', $range)
                ->whereMonth('created_at', '=', date("n"))
                ->whereYear('created_at', '=', date("Y"))
                ->first();
        $percentTestLessonInt = round(100 / $sumTestLesson->allTestLesson);
        $getTest = DB::table('test_lesson')
                ->select('topic.topic_name as name', 'topic.topic_id as id', 'lesson.lesson_name', DB::raw("COUNT(*)*$percentTestLessonInt as percentTest"))
                ->join('lesson', 'lesson.lesson_id', '=', 'test_lesson.lesson_id')
                ->join('topic', 'topic.topic_id', '=', 'lesson.topic_id')
                ->where('test_lesson.status', 1)
                ->groupBy('test_lesson.lesson_id')
                ->orderBy('topic.topic_name', 'DESC')
                ->get();
        return view('admin.chart.pieChart', compact('groupTopic', 'getTest'));
    }
}
