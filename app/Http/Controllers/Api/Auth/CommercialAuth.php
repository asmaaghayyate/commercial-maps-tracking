<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\Commercial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CommercialAuth extends Controller
{
    public function login(Request $request)
    {
        // Valider les données de la requête
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Log de la tentative de connexion
        \Log::info('Login attempt', $validatedData);
    
        // Chercher l'utilisateur par email
        $commercial = Commercial::where('email', $validatedData['email'])->first();
    
        // Vérifier les identifiants
        if ($commercial && Hash::check($validatedData['password'], $commercial->password)) {
            // Authentification réussie
            $token = $commercial->createToken('auth-token')->plainTextToken;
    
            return response()->json([
                'success' => true,
                'token' => $token,
                'user' => $commercial,
            ], 200);
        } else {
            // Authentification échouée
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials',
            ], 401);
        }
    }
}
