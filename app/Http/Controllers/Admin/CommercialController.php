<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Dashboard\CreateCommercialRequest;
use App\Models\Commercial;
use App\Models\Departement;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;

class CommercialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Commercial::latest()->with('user')->paginate(10);
        return view('admin.content.commercial.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departements = Departement::all();
        return view('admin.content.commercial.create', compact('departements'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCommercialRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'phone' => $request->phone,
        ]);

        $commercial =   Commercial::create(array_merge(
            $request->except(['name', 'email', 'password', 'role']),
            ['user_id' => $user->id]
        ));

        $user->update(attributes: ['commercial_id' => $commercial->id]);

        Cache::forget('commercial_list');

        return redirect()->route('admin.commercial.index')
            ->with('success', 'Commercial and User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Commercial $commercial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commercial $commercial)
    {
        $departements = Departement::all();
        return view('admin.content.commercial.edit', compact('commercial', "departements"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Commercial $commercial)
    {
        $user = User::findOrFail($commercial->user_id);
        $this->validate($request, [
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->filled('password') ? Hash::make($request->password) : $user->password,
            'phone' => $request->phone,
        ]);

        // Update Commercial
        $commercial->update($request->except(['name', 'email', 'password', 'role', 'phone']));
        Cache::forget('commercial_list');

        return redirect()->route('admin.commercial.index')
            ->with('success', 'Commercial and User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commercial $commercial)
    {
        if ($commercial) {
            $commercial->delete();
            Cache::forget('commercial_list');
        }
        return redirect()->route('admin.commercial.index')
            ->with('success', 'Commercial and User deleted successfully.');
    }
}
