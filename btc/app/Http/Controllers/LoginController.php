<?php


namespace App\Http\Controllers;

use App\Service\HttpService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            return HttpService::setSuccess([
                'access_token'  => $token,
                'token_type'    => 'Bearer',
                'expires_in'    => auth('api')->factory()->getTTL() * 60
            ])->Response();
        }catch (\Throwable $e){
            return HttpService::setFailed('登录失败')->Response();
        }
    }

    /**
     * 发送验证码接口
     */
    public function sendVerifyCode(Request $request){

    }

    /**
     * 注册接口
     */
    public function register(){
        try {

        }catch (\Throwable $e){

        }
    }

    /**
     * 获取当前登录信息
     * @param Request $request
     * @return JsonResponse
     */
    public function getUserDetail(Request $request): JsonResponse
    {
        try {
            $user = Auth::user();
            return HttpService::setSuccess($user)->Response();
        }catch (\Throwable $e){
            return HttpService::setFailed()->Response();
        }
    }
}
