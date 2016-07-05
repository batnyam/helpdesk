<?php

namespace Helpdesk\Http\Middleware;

use Closure;
use App;
use Session;
class language
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
        App::setLocale(Session::get('locale'));
        return $next($request);
    }
}
