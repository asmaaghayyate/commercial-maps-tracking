<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Dashboard\DepartementRequest;
use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Departement::latest()->paginate(10);
        return view('admin.content.Departement.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.content.Departement.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartementRequest $request)
    {
        $departement = Departement::create([
            'name' => $request->name,
          
        ]);

        
        return redirect()->route('admin.departement.index')
            ->with('success', 'Departement  created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Departement $departement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departement $departement)
    {
        return view('admin.content.departement.edit', compact('departement'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Departement $departement)
    {
        
        $departement->update([
            'name' => $request->name,
           
        ]);

        return redirect()->route('admin.departement.index')
            ->with('success', 'Departement  updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departement $departement)
    {
        if ($departement) {
            $departement->delete();
        }
      
        return redirect()->route('admin.departement.index')
            ->with('success', 'Departement  deleted successfully.');
    }
}
