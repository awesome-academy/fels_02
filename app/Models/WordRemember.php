<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class WordRemember extends Model
{
    protected $table = 'word_remember';
    protected $primaryKey = 'word_remember_id';
    public $timestamps = true;
    const CREATED_AT = 'date_learnded';
    protected $fillable = [
        'user_id',
        'word_id',
        'status',
        'follow',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lesson_Detail()
    {
        return $this->belongsTo(LessonDetail::class);
    }
}
