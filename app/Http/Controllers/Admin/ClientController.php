<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Dashboard\Client\CreateClientRequest;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Client::latest()->paginate(10);
        return view('admin.content.client.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.content.client.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateClientRequest $request)
    {
        // Inside your controller or service
        Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'phone' => $request->phone,
            'adresse' => $request->adresse,
        ]);

        Cache::forget(key: 'client_list');
        return redirect()->route('admin.client.index')
            ->with('success', 'Client and User created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('admin.content.client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $this->validate($request , [
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:5',
            'adresse' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('clients', 'email')->ignore($client->id),
            ],
        ]);

        $client->update($request->except('password')); // Exclude password if it's not being updated

        // Optionally, handle password update if provided
        if ($request->filled('password')) {
            $client->password = bcrypt($request->password);
            $client->save();
        }

        Cache::forget(key: 'client_list');

        return redirect()->route('admin.client.index')
            ->with('success', 'Client and User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        if ($client) {
            $client->delete();
            // $client->user()->delete();
        }


        return redirect()->route('admin.client.index')
            ->with('success', 'client and User deleted successfully.');
    }
}
