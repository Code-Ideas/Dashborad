<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAccess
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
        if (!(auth()->guard('admin')->check() && auth()->guard('admin')->user()->active)) {
            //auth()->guard('admin')->logout();
            return redirect()->route('login_form')->withErrors('عفوا انت لا تمتلك  صلاحية الوصول');
        }
        return $next($request);
    }
}
