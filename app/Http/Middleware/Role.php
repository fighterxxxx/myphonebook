<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $admin, $gestionnaire,  $user)
    {
        $role = Auth::check() ? Auth::user()->role : null;

        if ($admin == $role) {
            return $next($request);
        } else if ($gestionnaire == $role) {
            return $next($request);
        } else if ($user == $role) {
            return $next($request);
        }

        return back()->with("fail", "Vous n'avez pas les droits !");;
    }
}
