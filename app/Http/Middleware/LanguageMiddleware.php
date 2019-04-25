<?php

namespace App\Http\Middleware;

use Closure;

class LanguageMiddleware
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
        if (!session()->get('lang')) {
            session()->put(['lang' => 'vn']);
        }
        if ($lang = $request->session()->get('lang')) {
            \App::setLocale($lang);
        }

        return $next($request);
    }
}
