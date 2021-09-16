<?php

namespace App\Http\Middleware\Api;

use Closure;

class Supervisor
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
        if (auth('worker')->user()->type === 'supervisor' ) 
            return $next($request);
        
        return $this->response('not_auth' , __('auth.not_authorized'));
    }
}
