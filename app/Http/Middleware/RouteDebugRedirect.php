<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RouteDebugRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $condition = env('APP_DEBUG')
            // && ( env('APP_STAGE') != 'local' )
        ;
        if ($condition) {
            $firstSegment = $request->segment(1);
            $redirectCondition = $firstSegment != 't';
            if ($redirectCondition) {
                return redirect("/");
            }
        }
        return $next($request);
    }
}
