<?php

namespace App\Http\Middleware;

use Closure;

class loginMiddleware
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
       // dd($request);
       // \Log::info('ss');
        $response  = $next($request);
        if($response->isOk() && \Auth::check()){
            \Log::info('中间件测试');   //中间件测试

        }

        return $response;
       // return $next($request);
    }
}
