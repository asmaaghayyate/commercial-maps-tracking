<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class CommercialAuth extends Controller
{
    public function login(Request $request)
    {
        $this->validate(request(), [
            'email' => 'required|email|exists:commercials,email',
            'password' => 'required|string|min:8',
        ]);

        $credentials = $request->only('email', 'password');


        if (!$token = auth()->guard('commercial')->attempt($credentials)) {
            return response()->json(['success' => false, 'error' => 'Invalid credentials'], 401);
        }

        return response()->json(['success' => true, 'token' => $token]);
    }
}
