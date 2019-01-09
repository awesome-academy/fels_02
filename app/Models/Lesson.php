<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Lesson extends Model
{
    use Notifiable;
    protected $table = 'lesson';
    protected $primaryKey = 'lesson_id';
    public $timestamps = false;

    protected $fillable = [
        'lesson_name',
        'topic_id',
    ];

    public function  topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function lesson_Details()
    {
        return $this->hasMany(LessonDetail::class);
    }

    public function historys()
    {
        return $this->hasMany(History::class);
    }

    public function test_Lessons()
    {
        return $this->hasMany(TestLesson::class);
    }
}
