<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthRequests;
use App\Models\User;
use App\Permissions\Abilities;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiResponse;
    protected function respondWithToken($token)
    {
        $user = Auth::user();
        $data = [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60,
            'role_id' => $user->user_role_id
        ];
        return $this->ok('Logged In Successfully', $data);
    }
    public function login(AuthRequests $request)
    {
        if(!$token = Auth::attempt($request->only('email', 'password')))
        {
            return $this->error('Invalid Credentials', self::UNAUTHORIZED );
        }
        return $this->respondWithToken($token);
    }
    public function register(AuthRequests $request)
    {
        $registerUser = User::create($request->validated());
        return $this->success('Register Successfully', $registerUser, self::CREATED);
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
    }
}
