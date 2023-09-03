<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckProfile
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->complete == 1) {
            if (Auth::user()->allow == 1) {
                return $next($request);
            } else {
                $message = 'You or not allowed plz contact eith us';

                return redirect()->route('index')->with('warning', $message);
            }
        }
        if (Auth::user()->complete == 0) {
            $message = 'You Have to complete your Profile first';

            return redirect()->route('profile.complete')->with('warning', $message);
        } else {
            $message = 'You or not allowed plz contact eith us';

            return redirect()->route('index')->with('warning', $message);
        }
    }
}
