<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'history';
    protected $primaryKey = 'history_id';
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'lesson_id',
        'content',
        'isWord',
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
