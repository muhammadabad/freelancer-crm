<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        if(!Auth::user()){
            return redirect('/login');
        }
        elseif (Auth::user()->id == 1) {
            return $next($request);
        }
        elseif(Auth::user()->id != 1)
        {
          return redirect('/user');
        
        }
        else{
            Auth::logout();
        return redirect()->back();
        }
    }


}
