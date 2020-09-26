<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified as Verified;

class VerifyCheck
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
        if (Auth::check() && setting('require_user_verify')) {
            return app(Verified::class)->handle($request, function ($request) use ($next) {
                return $next($request);
            });
        }

        return $next($request);
    }
}
