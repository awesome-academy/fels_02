<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    protected $table = 'social_accounts';
    protected $primaryKey = 'user_social_id';
    public $timestamps = false;
    protected $fillable = [
        'provider_user_id',
        'provider'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
