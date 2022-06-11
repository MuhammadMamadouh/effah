<?php

namespace App\Http\Middleware;

use Closure;

class Approved
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
        if (!auth()->user()->is_approved) {
            return response('لم يتم مراجعة بياناتك.', 401);
        }
        return $next($request);
    }
}
