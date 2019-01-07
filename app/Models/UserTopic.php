<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTopic extends Model
{
    protected $table = 'usertopic';
    protected $primaryKey = 'usertopic_id';
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
