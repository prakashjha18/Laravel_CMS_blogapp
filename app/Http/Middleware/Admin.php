<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Session;
class Admin
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
        if(!Auth::user()->admin)
        {
            Session::flash('info','you do not have permissions to perform tis action');
            return redirect()->back();
        }
        return $next($request);
    }
}
