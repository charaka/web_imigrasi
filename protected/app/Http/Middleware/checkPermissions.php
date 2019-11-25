<?php

namespace App\Http\Middleware;

use Closure;
use Redirect;

class checkPermissions
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
        
        if(session('is_logged_in')==1){
            //echo "es pocong";

        }else{
            return redirect('/login');
            //echo "pocong";
            
        }
        return $next($request);

    }
}
