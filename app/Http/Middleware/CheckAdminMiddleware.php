<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;

class CheckAdminMiddleware
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed;
     */
    public function handle($request, Closure $next)
    {
        if ($this->user->checkAdmin()) {
   
            return $next($request);
        } else {

            return redirect()->route('home.index')->with('msg', trans('messages.check_admin'));
        }
    }
}
