<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Lesson\LessonRepository;
use App\Repositories\Topic\TopicRepository;

class Lessons extends Controller
{
    protected $lessonRepository;
    protected $topicRepository;

    public function __construct(
        LessonRepository $lessonRepository,
        TopicRepository $topicRepository
    )
    {
        $this->lessonRepository = $lessonRepository;
        $this->topicRepository = $topicRepository;
    }

    public function show($topic_id)
    {
        $displayLessons = $this->lessonRepository->getAll();
        $displayTopics = $this->topicRepository->getAll();
        
        $topic = $this->topicRepository->find($topic_id);

        $resultLesson = $this->lessonRepository->paginate($topic_id);

        return view('home.lesson.index', compact('displayTopics', 'displayLessons', 'resultLesson', 'topic'));
    }
}
