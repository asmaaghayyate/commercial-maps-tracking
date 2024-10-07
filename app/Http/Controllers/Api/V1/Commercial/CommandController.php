<?php

namespace App\Http\Controllers\Api\V1\Commercial;

use App\Events\Admin\TakCommandeEvent;
use App\Events\Api\V1\AddLocationEvent;
use App\Events\Api\V1\TakeCommandEvent;
use App\Http\Controllers\Controller;
use App\Models\Command;
use App\Models\CommandDetail;
use App\Models\User;
use App\Notifications\TakeCommande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Notification;

class CommandController extends Controller
{
    public function MyCommands()
    {
        $commands = Command::where('commercial_id', auth()->guard("commercial")->user()->id)
            ->with(['client'])->latest()
            ->paginate(10);
        return response()->json($commands, 200);
    }


    public function TakCommand(Command $command)
    {
        //$user = auth()->guard("commercial")->user();
       //dd( $user);
        if (!$command->commercial_id) {
            $command->update([
                "commercial_id" => auth()->guard("commercial")->user()->id
            ]);

            $user = auth()->guard("commercial")->user();
 
            //$user->notify(new TakeCommande($command));
     Notification::send($user,new TakeCommande($command));

            event(new TakeCommandEvent('command have been taked'));
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
       // $this->authorize('view-command', $command); // Vérifiez que $commande est une instance de Command

       // dd(Gate::allows('addlocation',$command));
//dd($command->commercial_id."//".auth()->guard("commercial")->user()->id);

        if (Gate::allows('addlocation', $command)) {
      
            $request->validate([
                'current_location' => 'required|json',
            ]);

            CommandDetail::create([
                'command_id' => $command->id,
                'current_location' => $request->current_location,
            ]);
            event(new AddLocationEvent($command->id));

            return response()->json([
                "message" => "Localisation ajoutée avec succès."
            ], 200);
        } else {
            return response()->json([
                "message" => "Veuillez prendre en charge une commande pour ajouter une nouvelle localisation."
            ], 400);
        }
    }

    public function listecommandes()
    {

        $commands = Command::whereNull('commercial_id')->with('client')->latest()->paginate(10); // Récupérer les commandes avec commercial_id = null
        return response()->json($commands, 200);
    }


    public function readall(Request $request)
    {
        // Récupère toutes les notifications non lues dans la base de données
        $notifications = \Illuminate\Notifications\DatabaseNotification::whereNull('read_at')->get();
    
        // Marque toutes les notifications non lues comme lues
        foreach ($notifications as $notification) {
            $notification->markAsRead();
        }
    
        return back(); // Redirige vers la page précédente
    }
    


}
