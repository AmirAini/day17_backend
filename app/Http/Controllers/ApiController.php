<?php

namespace App\Http\Controllers;

use JWTAuth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use Tymon\JWTAuth\Validators\Validator;

class ApiController extends Controller
{
    //



    /**
 * Log in the user.
 *
 * @bodyParam   email    string  required    The email of the  user.      Example: testuser@example.com
 * @bodyParam   password    string  required    The password of the  user.   Example: secret
 *
 * @response {
 *  "access_token": "eyJ0eXA...",
 *  "token_type": "Bearer",
 * }
 */

    public function login(Request $request){
    	$validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (! $token = JWTAuth::attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->createNewToken($token);
    }

    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }


    public function dashboard(Request $request){
        $user_total = User::get()->count();
        $code = 0;
        return response()->json(
            //output is Json
            compact('user_total','code')
        );
    }
}

