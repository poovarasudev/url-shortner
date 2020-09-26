<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

/**
 * Check if the user is an Admin or not.
 *
 * Class checkAdmin
 */
class CheckAdmin
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
        if (User::isAdmin()) {
            return $next($request);
        }

        return abort(404);
    }
}
