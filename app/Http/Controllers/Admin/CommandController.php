<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Command;
use App\Models\CommandDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Command::with(['commercial', 'admin', 'client'])->paginate(10);
        return view('admin.content.command.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.content.command.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'latitude' => $request->longitude,
            'longitude' => $request->latitude,
        ];

        Command::create([
            'destination' => $data,
            'admin_id' => Auth::user()->id,
            'destination_name' => $request->destination_name,
        ]);

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

        $latestDetail = CommandDetail::where('command_id', $command->id)->latest()->first();

        $destinationArray = json_decode($command->destination, true);
        $latestLocation = json_decode($latestDetail->current_location, true);

        return view('admin.content.command.show', [
            'command' => $command,
            'destinationArray' => $destinationArray,
            'latestLocation' => $latestLocation,

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
