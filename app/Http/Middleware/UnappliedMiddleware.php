<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnappliedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            if($request->user()->type == "instructor"){
                if($request->user()->instructor_status == "unapplied" || $request->user()->instructor_status == "pending" || $request->user()->instructor_status == "declined"){
                    return redirect()->route('instructor.application');
                }
            }
        }

        return $next($request);
    }
}
