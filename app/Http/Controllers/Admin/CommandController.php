<?php

namespace App\Http\Controllers\Admin;

use App\Events\Admin\CreateCommandEvent;
use App\Http\Controllers\Controller;
use App\Models\Command;
use App\Models\CommandDetail;
use App\Models\Commercial;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class CommandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Command::with(['commercial', 'admin', 'client'])->latest()->paginate(10);
        return view('admin.content.command.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $commercials = Cache::get('commercial_list');
        $clients = Cache::get('client_list');
        return view('admin.content.command.create', compact('commercials', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ];

        Command::create([
            'destination' => $data,
            'admin_id' => Auth::user()->id,
            'destination_name' => $request->destination_name,
            "commercial_id" => $request->commercial_id,
            "client_id" => $request->client_id
        ]);

        event(new CreateCommandEvent(
            message: 'You Have New Command',
            user: Commercial::find( $request->commercial_id)
        ));

        return redirect()->route('admin.command.index')->with([
            "success" => "data create with success"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Command $command)
    {
        $command->load(['commercial.user', 'admin', 'client.user']);

        // Check if destination is a JSON string or an array
        $destinationArray = is_string($command->destination)
            ? json_decode($command->destination, true)
            : $command->destination; // Use directly if it's already an array

        return view('admin.content.command.show', [
            'command' => $command,
            'destinationArray' => $destinationArray,
        ]);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Command $command)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Command $command)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Command $command)
    {

        if ($command) {
            $command->delete();
        }
        return redirect()->route('admin.command.index')
            ->with('success', 'commande deleted successfully.');
    }
}
