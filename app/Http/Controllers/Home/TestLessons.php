<?php
namespace App\Http\Controllers\Home;
use App\Notifications\TestLessonNotify;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Topic;
use App\Models\Lesson;
use App\Models\LessonDetail;
use App\Models\TestLesson;
use App\Models\UserTopic;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class TestLessons extends Controller
{
    public function show($id)
    {
        $displayTopics = Topic::get();
        $displayLessons = Lesson::get();
        $lesson = Lesson::where('lesson_id', $id)->first();
        $topic = Topic::where('topic_id', $lesson->topic_id)->first();
        $words = LessonDetail::where('lesson_id', $lesson->lesson_id)->get();
        $lessons = Lesson::where('topic_id', $topic->topic_id)->get();
        $newexam = [
            'exam_name' => $lesson->lesson_name,
            'user_id' => Auth::user()->user_id,
            'lesson_id' => $id
        ];
        $check = TestLesson::where('user_id', Auth::user()->user_id)->where('lesson_id', $id)->count();
        if($check == 0)
        {
            TestLesson::create($newexam);
        }

        return view('home.lesson.testLesson', compact('displayTopics', 'displayLessons', 'lesson', 'lessons', 'topic', 'words'));
    }

    public function testLessonInserted($user_id, $count, $percent, $lesson, $test_lesson)
    {
        $allTestLesson = TestLesson::pluck('exam_name', 'lesson_id');
        $arrTestLesson = $allTestLesson->toArray();
        if (!array_key_exists($lesson->lesson_id, $arrTestLesson))
        {
            $test_lesson->exam_name = $lesson->lesson_name;
            $test_lesson->user_id = $user_id;
            $test_lesson->lesson_id = $lesson->lesson_id;
            $test_lesson->sum_correct_answer = $count;
            if ( $percent >= config('setting.passPercent') ) 
            {
                $test_lesson->status = config('setting.numberDefault1');
            } 
            else 
            {
                $test_lesson->status = config('setting.numberDefault0');
            }
            $test_lesson->save();
        }
        else 
        {
            if ( $percent >= config('setting.passPercent') ) 
            {
                $test_lesson->status = config('setting.numberDefault1');
            } 
            else 
            {
                $test_lesson->status = config('setting.numberDefault0');
            }

            TestLesson::where('lesson_id', $lesson->lesson_id)->update([
                'sum_correct_answer' => $count,
                'status'=>$test_lesson->status,
            ]);
        }
    }

    public function insertProgress($user_id, $topic_id, $percent)
    {
        $allUserTopic = UserTopic::where('user_id', $user_id)->pluck('usertopic_id', 'topic_id');
        $arrUserTopic = $allUserTopic->toArray();
        $countLesson = Lesson::where('topic_id', $topic_id)->count();
        $usertopic = new UserTopic;
        $usertopic->topic_id = $topic_id;
        $usertopic->user_id = $user_id;
        $defaultProgress = config('setting.numberDefault0');

        if (!array_key_exists($topic_id, $arrUserTopic)) 
        {
            if ( $percent >= config('setting.passPercent') ) 
            {
                $usertopic->progress = ($defaultProgress + config('setting.numberDefault1')).'/'.$countLesson;
            } 
            else 
            {
                $usertopic->progress = ($defaultProgress).'/'.$countLesson;
            }

            $usertopic->save();
        } else {
            $getProgress = UserTopic::select('progress')->where(['topic_id'=>$topic_id, 'user_id'=>$user_id])->first();
            $explodeProgress = explode('/', $getProgress->progress);
            $nowProgress = $explodeProgress[0];
            if ( $percent >= config('setting.passPercent') ) 
            {
                $usertopic->progress = ($nowProgress + 1).'/'.$countLesson;
            }
            else 
            {
                if ($nowProgress >= config('setting.numberDefault1')) 
                {
                    $usertopic->progress = ($nowProgress).'/'.$countLesson;
                } 
                else 
                {
                    $usertopic->progress = ($nowProgress).'/'.$countLesson;
                }
            }
            UserTopic::where(['topic_id'=>$topic_id, 'user_id'=>$user_id])->update(['progress'=>$usertopic->progress]);
        }
    }

    public function testLesson(Request $request, $id)
    {
        $displayTopics = Topic::get();
        $displayLessons = Lesson::get();
        $lesson = Lesson::where('lesson_id', $id)->first();
        $topic = Topic::where('topic_id', $lesson->topic_id)->first();
        $lessons = Lesson::where('topic_id', $topic->topic_id)->get();
        $words = LessonDetail::where('lesson_id', $lesson->lesson_id)->get();
        $user_id = Auth::user()->user_id;
        $username = Auth::user()->username;
        $test_lesson = new TestLesson;
        $topic_id = $lesson->topic_id;
        $countWord = LessonDetail::where('lesson_id', $lesson->lesson_id)->count();
        $count = 0;
        //dot the result
        $oldWords = array();
        foreach ($words as $key => $word) {
            $word_name = 'word'.$word->word_id;
            if ($request->$word_name === $word->word_name) 
            {
                $count += config('setting.numberDefault1');
            }
            $oldWords += array($word->word_id => $request->$word_name);
        }
        $percent = number_format((($count / $countWord) * 100), config('setting.numberFormat'));
        $this->testLessonInserted($user_id, $count, $percent, $lesson, $test_lesson);
        $this->insertProgress($user_id, $topic_id, $percent);
        $user = User::where('role_id', '=', config('setting.admin_role'))->orwhere('role_id', '=', config('setting.member_role'))->get();
        if($percent >= config('setting.passPercent'))
        {
            $test_user = TestLesson::where('lesson_id', $id)->first();
            Notification::send($user, new TestLessonNotify($test_user));
        }
        if ($percent >= config('setting.passPercent') )
        {
            $msg = trans('messages.testSuccess');

            return view('home.lesson.testLesson', compact('displayTopics', 'displayLessons', 'topic', 'lesson', 'words', 'lessons', 'count', 'username', 'msg', 'percent', 'countWord', 'oldWords'));
        }
        else 
        {
            $msg = trans('messages.testFail');

            return view('home.lesson.testLesson', compact('displayTopics', 'displayLessons', 'topic', 'lesson', 'words', 'lessons', 'count', 'username', 'msg', 'percent', 'countWord', 'oldWords'));
        }
    }
}
