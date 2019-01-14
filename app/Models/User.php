<?php

namespace App\Models;

use App\Models\History;
use App\Models\Lesson;
use App\Models\TestLesson;
use App\Models\WordRemember;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    public $timestamps = false;

    protected $fillable = [
        'username',
        'password',
        'fullname',
        'email',
        'gender',
        'date_of_birth',
        'address',
        'phone',
        'avatar',
        'role_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function word_Remembers()
    {
        return $this->hasMany(WordRemember::class);
    }

    public function test_Lessons()
    {
        return $this->hasMany(TestLesson::class);
    }

    public function historys()
    {
        return $this->hasMany(History::class);
    }
}
