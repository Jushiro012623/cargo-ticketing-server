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
    public function login(AuthRequests $request)
    {
        $login_user = Auth::attempt($request->only('email', 'password'));
        if (!$login_user) {
            return $this->error('Invalid Credentials', 401 );
        }
        $user = User::firstWhere('email', $request->email);
        $userToken = [
            'token' =>$user->createToken('Token for '. $user->email, Abilities::getAbilities($user), now() -> addMonth() )->plainTextToken
        ];
        return $this->ok('Loggin Successfully', $userToken);
    }

    public function register(AuthRequests $request)
    {
        $registerUser = User::create($request->validated());
        return $this->success('Register Successfully', $registerUser, 201);
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
    }
}
