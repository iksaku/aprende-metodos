<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;

class ExerciseTimingMiddleware
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
        session()->reflash();

        session()->keep(['started_at', 'closes_at']);

        if (now()->isAfter(Carbon::createFromTimestamp(session()->get('closes_at')))) {
            session()->forget(['started_at', 'closes_at']);
        }

        return $next($request);
    }
}
