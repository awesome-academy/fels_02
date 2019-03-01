<?php
namespace App\Repositories\Lesson;

use App\Repositories\BaseRepository;

class LessonRepository extends BaseRepository implements LessonRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Lesson::class;
    }

    public function paginate($id)
    {
        return $this->model::where('topic_id', $id)->paginate(config('setting.number_lessonPaginate'));
    }
}
