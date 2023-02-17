<?php

namespace App\Http\Middleware;

use App\Service\HttpService;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  Request  $request
     */
    protected function redirectTo($request)
    {
        try {
            if ($request->expectsJson()) {
                return HttpService::setFailed('请登录')->Response();
            }
        }catch (\Throwable $e){
            return HttpService::setFailed('请登录')->Response();
        }

    }
}
