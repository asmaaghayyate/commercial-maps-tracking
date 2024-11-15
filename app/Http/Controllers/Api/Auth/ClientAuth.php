<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientAuth extends Controller
{
    

    public function login(Request $request)
    {
        $this->validate(request(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:8',
        ]);

        $credentials = request(['email', 'password']);

        $token = Auth::guard('api')->attempt($credentials);
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = Auth::guard(name: 'api');
        return response()->json([
            'status' => 'success',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }


}
