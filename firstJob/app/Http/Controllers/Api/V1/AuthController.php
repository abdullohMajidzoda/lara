<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\LoginUserRequest;

class AuthController extends Controller
{
    public function register(StoreUserRequest $request)
    {
        return User::create($request->all());
    }


    public function login(LoginUserRequest $request)
    {
        if(!Auth::attempt($request->only(['email', 'password']))){
            return response()->json([
                'message' => 'Wrong email or password'
            ], 401);
        }
        // $user = Auth::user();
        $user = User::where('email', $request->email)->first();
        $user->tokens()->delete();
        return response()->json([
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user-role,
            ],
            'token' => $user->createToken("token of {$user->name}")->plainTextToken,
        ]);
    }

    public function logout()
    {
        return 'LOGOUT';
    }
}
