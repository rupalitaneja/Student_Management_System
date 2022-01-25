<?php

namespace App\Http\Middleware;
use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $role = Auth::user()->role;
            if ($role == 3) {
                return redirect('/admin/home');
            } else if($role ==2 ) {
                return redirect('/teacher/home');
            }
            else if($role ==1) {
                return redirect('/student/home');
            }
            else{
                return redirect('home');
            }
        }
        return $next($request);
    }
}