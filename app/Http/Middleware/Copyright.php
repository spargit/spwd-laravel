<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;

class Copyright
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
        $request->request->add(['copyright' => Carbon::now()->format('Y')]);
        return $next($request);
    }
}
