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
        if($social == "twitter")
        {
            return Socialite::driver($social)->redirect();
        } else {

            return Socialite::driver($social)->stateless()->redirect();
        }
    }

    public function callback($social)
    {
        if($social == "twitter")
        {

            $user = SocialAccountService::createOrGetUser2(Socialite::driver($social)->user(), $social);
        } else {

            $user = SocialAccountService::createOrGetUser(Socialite::driver($social)->stateless()->user(), $social);
        }
        auth()->login($user);

        return redirect()->to('/home');

    }
}
