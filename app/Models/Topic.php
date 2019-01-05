<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Lesson;

class Topic extends Model
{
    protected $table = 'topic';
    protected $primaryKey = 'topic_id';
    public $timestamps = true;

    protected $fillable = [
        'topic_name',
        'preview',
        'progress',
        'picture',
        'parent_id',
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
