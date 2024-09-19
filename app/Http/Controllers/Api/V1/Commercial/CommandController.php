<?php

namespace App\Http\Controllers\Api\V1\Commercial;

use App\Http\Controllers\Controller;
use App\Models\Command;
use App\Models\CommandDetail;
use Illuminate\Http\Request;

class CommandController extends Controller
{
    public function MyCommands()
    {
        // return response()->json(auth()->user());
        $commands = Command::where('commercial_id', auth()->user()->commercial->id)->with(['client'])->get();
        return response()->json($commands, 200);
    
        // $userId=auth()->id();
        // $commands = Command::whereHas(
        //     'commercial', function ($query) use ($userId) {
        //     $query->where('user_id', $userId);
        // })->with('commercial')->with(['client'])->get(); // Charger la relation commercial
          
    
        // return response()->json($commands, 200);

    // 
    }


    public function TakCommand(Command $command)
    {
        if (!$command->commercial_id) {
            $command->update([
                "commercial_id" =>auth()->user()->commercial->id
            ]);
            return response()->json([
                "message" => "Commande prise en charge avec succès."
            ], 200);
        } else {
            return response()->json([
                "message" => "Cette commande est déjà prise en charge par un commercial."
            ], 400);
        }
    }

    public function AddLocation(Command $command, Request $request)
    {
        if (auth()->id() === $command->commercial_id) {
            $request->validate([
                'current_location' => 'required|json',
            ]);

            CommandDetail::create([
                'command_id' => $command->id,
                'current_location' => $request->current_location,
            ]);
            return response()->json([
                "message" => "Localisation ajoutée avec succès."
            ], 200);
        } else {
            return response()->json([
                "message" => "Veuillez prendre en charge une commande pour ajouter une nouvelle localisation."
            ], 400);

        }
    }
}
