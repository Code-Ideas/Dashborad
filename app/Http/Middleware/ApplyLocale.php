<?php

namespace App\Http\Middleware;

use Closure;

class ApplyLocale
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
        $segments = collect($request->segments());

        $locale = $segments->first();

        if (! in_array($locale, config('app.locales'))) {
            $locale = 'ar';
            app()->setLocale($locale);
            $segments->prepend($locale);

            return redirect($segments->implode('/'));
        }

        app()->setLocale($locale);
        return $next($request);
    }
}
