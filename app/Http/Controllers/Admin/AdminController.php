<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    //

    public function index()
    {
        $data = User::where('role', 'admin')->paginate(10); // Récupérer les utilisateurs avec le rôle "admin"
        return view('admin.content.admin.index', compact('data'));
    }





public function create(){

    return view('admin.content.admin.create');
}


public function store(Request $request){

    $user = User::create([ 
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role,
        'phone' => $request->phone,
    ]);


    return redirect()->route('admin.user.index')
    ->with('success', 'Admin created successfully.');

    
}


public function edit(User $user)
{

    return view('admin.content.admin.edit',
     compact('user'));
}

public function update(Request $request, User $user){

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->filled('password') ? Hash::make($request->password) : $user->password,
        'phone' => $request->phone,
    ]);
    return redirect()->route('admin.user.index')
    ->with('success', 'Admin updated successfully.');
}


public function destroy(User $user)
{

        $user->delete();
        return redirect()->route('admin.user.index')
            ->with('success', 'User deleted successfully.');
 
}


}
