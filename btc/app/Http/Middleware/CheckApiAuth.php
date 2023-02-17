<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWT;

class CheckApiAuth
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            //todo 检查登录信息
            $header = $request->headers;
            $request->setUserResolver();
            $request->getUser();
        }catch (\Throwable $e){
            //todo 返回请需要登录
        }
        return $next($request);
    }
}
