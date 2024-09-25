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
        $data = Commercial::latest()->with('departement')->paginate(10);
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
        Commercial::create($request->all());

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
        // Validate the incoming request
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:5',
            'genre' => 'required|string|max:255',
            'type_deplacement' => 'required|string|max:255',
            'identite' => 'required|string|max:255',
            'adresse' => 'required|string|max:1000',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'type_contrat' => 'required|string|max:255',
            'departement_id' => 'required|exists:departements,id',
            'phone' => 'nullable|string|regex:/^\+?[0-9\s\-\(\)]+$/',
            'email' => [
                'required',
                'email',
                Rule::unique('commercials')->ignore($commercial->id),
            ],
        ]);

        // Update the commercial record
        $commercial->update($request->except('password')); // Exclude password if it's not being updated

        // Optionally, handle password update if provided
        if ($request->filled('password')) {
            $commercial->password = bcrypt($request->password);
            $commercial->save();
        }

        // Clear the cached commercial list
        Cache::forget('commercial_list');

        // Redirect back with a success message
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
