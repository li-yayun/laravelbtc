<?php


namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\JWTAuth;

class LoginController extends Controller
{

    /**
     * 登录接口
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function loginJwt(Request $request): \Illuminate\Http\JsonResponse
    {
        $condition = \request(['tel','password']);
        $token = auth('api')->attempt($condition);
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    /**
     * 注册接口
     */
    public function register(){

    }

    public function getUserDetail(Request $request){
        $user = Auth::user();
        dd($user);
    }
}
