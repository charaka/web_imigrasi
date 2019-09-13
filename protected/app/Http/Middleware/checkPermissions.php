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
        
        $url = request()->segment(1);
        if(in_array($url,session('permissions'))){
            //echo "es pocong";

        }else{
            return redirect('home');
            //echo "pocong";
            
        }
        return $next($request);

    }
}
