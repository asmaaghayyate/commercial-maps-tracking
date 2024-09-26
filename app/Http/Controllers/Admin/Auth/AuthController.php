<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
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
            'password' => 'required|min:8',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
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
}
