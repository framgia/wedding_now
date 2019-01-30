<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user()->load('roles');

            if (in_array(config('define.role.admin'), $user->roles->pluck('id')->toArray())) {
                return $next($request);
            }

            return redirect('/');
        }

        return redirect('login')->withErrors(['message' => __('admin.fail_login')]);
    }
}
