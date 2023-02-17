<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Tymon\JWTAuth\JWT;

class LoginController extends Controller
{

    public function loginByJwt(Request $request){
        $credentials = request(['email', 'password']);
        auth('api')->attempt($credentials);
    }
}
