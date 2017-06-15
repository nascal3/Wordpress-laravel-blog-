<?php

namespace App\Http\Middleware;

use App\Post;
use Closure;

class CheckPermissionsMiddleware
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
        if(! check_user_permissions($request)) {
            abort(403, "Forbidden from accessing this page");
        }
        return $next($request);
    }
}
