<?php
// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Auth\Middleware\Authenticate as Middleware;

// class Authenticate extends Middleware
// {
//     /**
//      * Get the path the user should be redirected to when they are not authenticated.
//      */
//     protected function redirectTo($request)
//     {
//         if (! $request->expectsJson()) {
//             return route('mainpage');
//         }
//     }

//     /**
//      * Handle an incoming request.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \Closure  $next
//      * @param  mixed  ...$guards
//      * @return mixed
//      */
//     public function handle($request, Closure $next, ...$guards)
//     {
//         $this->authenticate($request, $guards);

//         if (! $this->auth->guard($guards)->check()) {
//             // Zmień poniższy warunek, aby przekierować gości na stronę dashboard
//             if ($request->routeIs('mainpage')) {
//                 return $next($request);
//             } else {
//                 return redirect()->guest(route('mainpage'));
//             }
//         }

//         return $next($request);
//     }
// }

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return null;
        }
    }
}
