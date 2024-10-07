<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    //

    public function index()
    {
        $data = Admin::paginate(10); // Récupérer les utilisateurs avec le rôle "admin"
        return view('admin.content.admin.index', compact('data'));
    }



public function create(){

    return view('admin.content.admin.create');
}


public function store(Request $request){



    
    $user = Admin::create([ 
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return redirect()->route('admin.user.index')
    ->with('success', 'Admin created successfully.');

    
}


public function edit(Admin $admin)
{

    return view('admin.content.admin.edit',
     compact('admin'));
}

public function update(Request $request, Admin $admin){

    $admin->update([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->filled('password') ? Hash::make($request->password) : $admin->password,
    ]);
    return redirect()->route('admin.admin.index')
    ->with('success', 'Admin updated successfully.');
}


public function destroy(Admin $admin)
{

        $admin->delete();
        return redirect()->route('admin.admin.index')
            ->with('success', 'User deleted successfully.');
 
}


}
