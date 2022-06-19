<?php

namespace App\Http\Middleware;

use App\Models\Question;
use Closure;

class CompletedProfile
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
        $questionsIDs = Question::where('can_skip', false)->pluck('id');
        dd($questionsIDs);
        if (!auth()->user()->is_approved) {
            return response('لم يتم مراجعة بياناتك.', 401);
        }
        return $next($request);
    }
}
