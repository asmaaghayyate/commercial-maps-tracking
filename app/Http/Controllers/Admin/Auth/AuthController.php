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
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->role === RoleEnum::ADMIN->value) {
                return redirect()->intended('/admin');
            } else {
                Auth::logout();
                return redirect()->back()->with([
                    'error' => 'You are not authorized to access this area.',
                ]);
            }
        } else {
            return redirect()->back()->with([
                'error' => 'These credentials do not match our records.',
            ]);
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
