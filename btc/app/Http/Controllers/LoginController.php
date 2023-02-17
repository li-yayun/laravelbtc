<?php


namespace App\Http\Controllers;

use App\Service\HttpService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\JWTAuth;

class LoginController extends Controller
{
    /**
     * 登录接口
     * @param Request $request
     * @return JsonResponse
     */
    public function loginJwt(Request $request): JsonResponse
    {
        try {
            $condition = \request(['tel','password']);
            $token     = auth('api')->attempt($condition);
            $http = HttpService::setSuccess([
                'access_token' => $token,
                'token_type' => 'Bearer',
                'expires_in' => auth('api')->factory()->getTTL() * 60
            ]);
        }catch (\Throwable $e){
            $http = HttpService::setFailed([],'登录失败');
        }
        return $http->Response();
    }

    /**
     * 注册接口
     */
    public function register(){
        try {

        }catch (\Throwable $e){

        }
    }

    public function getUserDetail(Request $request){
        $user = Auth::user();
        dd($user);
    }
}
