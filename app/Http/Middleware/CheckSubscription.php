<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckSubscription
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
        if(Auth::user()->role_id == 2) {
            if(Auth::user()->status == 0) {
                Auth::logout();
                return redirect('/login')->with('error', 'Please Wait the Admin to Activate your Account');
            } 
            $date = date('Y-m-d H:i', strtotime(Auth::user()->subscription_expire));
            if($date < date('Y-m-d H:i') || Auth::user()->subscription_expire == null){
                return redirect()->route('no-payment');
            }
            return $next($request);
        } else{
            return $next($request);
        }
    }
}
