<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMail;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function LoginForm()
    {
        return view('admin.auth.login');
    }
    public function Login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:2',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/admin');
        } else {
            return redirect()->back()->with([
                'error' => 'These credentials do not match our records.',
            ]);
        }
    }

    public  function logout()
    {

        Auth::logout();
        return redirect('/login');
    }

    public function forgetlogin(){
        return view("admin.auth.forgetlogin");
    }
    

    public function sendResetLinkEmail(Request $request)
    {   
        // Valider l'email
        $request->validate(['email' => 'required|email']);
     
        // Vérifier si l'email existe dans la table admins
        $admin = Admin::where('email', $request->email)->first();
    
        if ($admin) {
            $token = app('auth.password.broker')->createToken($admin);
    
            // Envoyer l'email avec le lien de réinitialisation
            \Mail::to($request->email)->send(new ResetPasswordMail($token, $request->email));
    
            return redirect()->route("password.request")
            ->with(['success' => "nous vous avons envoye un email."]);
        } else {
            // L'email n'existe pas, afficher un message d'erreur
            return redirect()->route("password.request")
                ->withErrors(['erreur' => "Cet email n'existe pas, veuillez entrer un autre email."]);
        }
    }



    public function showResetForm(Request $request){
        $email=$request->email;
        return view("admin.auth.resetpassword",compact('email'));
    }
    
    public function passwordupdate(Request $request)
    {
     // return $request->email."".$request->password;
        // Valider les entrées
       $values= $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:5|confirmed', // Ajout de 'confirmed' pour vérifier le mot de passe de confirmation
        ]);
    
        // Vérifier si l'email existe dans la table admins
        $admin = Admin::where('email', $request->email)->first();
    
        // Hacher le mot de passe et mettre à jour
        //$values['password']=Hash::make($request->password);
        $admin->update(['password' => Hash::make($request->password)]); // Hachage du mot de passe
    
        return redirect()->route("password.request")
            ->with(['success' => "Votre mot de passe a été bien modifié."]);
    }

}
