<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\Commercial;
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
