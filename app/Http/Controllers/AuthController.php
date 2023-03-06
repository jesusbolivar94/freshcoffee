<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return [
            'token' => $user->createToken('token')->plainTextToken,
            'user' => new UserResource($user)
        ];
    }

    public function login(Request $request) {

    }

    public function logout(Request $request) {

    }
}
