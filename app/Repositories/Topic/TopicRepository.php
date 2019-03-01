<?php
namespace App\Repositories\Topic;

use App\Repositories\BaseRepository;

class TopicRepository extends BaseRepository
{
    public function getModel()
    {
        return \App\Models\Topic::class;
    }
}
