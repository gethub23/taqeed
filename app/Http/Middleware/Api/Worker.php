<?php

namespace App\Http\Middleware\Api;

use Closure;
use App\Traits\Responses;

class Worker
{
    use Responses;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth('worker')->user()->type === 'worker' ) 
            return $next($request);
          
        return $this->response('not_auth' , __('auth.not_authorized'));
    }
}
