<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckBanned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
{
    $user = Auth::user();
    if ($user->is_banned) {
        auth()->logout();
        return redirect()->route('login')->with('error', 'Your account has been Banned.');
    }elseif($user->retention) {
        auth()->logout();
        return redirect()->route('login')->with('error', 'Your account has been deactivated.');
    }
    return $next($request);
}

}
