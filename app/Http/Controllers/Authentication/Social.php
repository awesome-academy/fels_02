<?php

namespace App\Http\Controllers\Authentication;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\SocialAccountService;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Topic;
use App\Models\Lesson;
use Socialite;

class Social extends Controller
{
    public function redirect($social)
    {

        return Socialite::driver($social)->redirect();

    }

    public function callback($social)
    {
        $user = SocialAccountService::createOrGetUser(Socialite::driver($social)->user(), $social);
        auth()->login($user);

        return redirect()->to('/home');

    }
}
