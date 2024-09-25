<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\Commercial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class CommercialAuth extends Controller
{
    public function login(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'email' => 'required|email|exists:commercials,email',
            'password' => 'required|string|min:8',
        ]);

        // Retrieve the credentials
        $credentials = $request->only('email', 'password');

        // Attempt to authenticate the user
        $commercial = Commercial::where('email', $credentials['email'])->first();

        // Check if the user exists and the password is correct
        if (!$commercial || !Hash::check($credentials['password'], $commercial->password)) {
            return response()->json(['success' => false, 'error' => 'Invalid credentials'], 401);
        }

        // Create a token for the authenticated user
        $token = $commercial->createToken('CommercialToken')->plainTextToken;

        return response()->json(['success' => true, 'token' => $token]);
    }

    public function profile()
    {
        $user = Auth::user();


        return response()->json([
            'status' => 'success',
            'user' => $user,
        ]);
    }


    public function update(Request $request)
    {
        // $user = User::findOrFail($commercial->user_id);
        $values = $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users,email," . Auth::id(),
            "password" => "required|min:6", // ou d'autres règles selon tes besoins
            "phone" => "required",
        ]);
        $user = Auth::user();

        $values["password"] = Hash::make($request->password);
        $user->fill($values)->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Informations mises à jour avec succès.',
            'user' => $user,
        ]);
    }
}
