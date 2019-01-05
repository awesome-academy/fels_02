<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class TestLesson extends Model
{
    protected $table = 'test_lesson';
    protected $primaryKey = 'exam_id';
    public $timestamps = true;

    protected $fillable = [
        'exam_name',
        'user_id',
        'lesson_id',
        'sum_correct_answer',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
