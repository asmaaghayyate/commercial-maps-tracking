<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\Commercial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CommercialAuth extends Controller
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

        $user = Auth::guard('api');
        return response()->json([
            'status' => 'success',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }


    public function profile() {
       // $user = auth()->user();
       $user = Auth::user();
        // Vérifie si l'utilisateur est authentifié
       
    
        return response()->json([
            'status' => 'success',
            'user' => $user,
        ]);
    }


public function update(Request $request)
    {
// $user = User::findOrFail($commercial->user_id);
$values= $request->validate([
    "name" => "required",
    "email" => "required|email|unique:users,email," . Auth::id(),
    "password" => "required|min:6", // ou d'autres règles selon tes besoins
    "phone" => "required",
]);
$user = Auth::user();

/*$user->update([
     'name' => $request->name,
    'email' => $request->email,
    'password' => $request->filled('password') ? Hash::make($request->password) : $user->password,
    'phone' => $request->phone,
]); */
$values["password"]= Hash::make($request->password);
$user->fill($values)->save();

    return response()->json([
        'status' => 'success',
        'message' => 'Informations mises à jour avec succès.',
        'user' => $user,
    ]);
    
}






}
