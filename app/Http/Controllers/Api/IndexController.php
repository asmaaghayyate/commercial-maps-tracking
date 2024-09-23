<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Command;
use App\Models\CommandDetail; // Make sure to include this
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function getLatestLocation(Command $command)
    {
        $latestDetail = CommandDetail::where('command_id', $command->id)->latest()->first();

        if ($latestDetail && $latestDetail->current_location) {

            $currentLocation = is_string($latestDetail->current_location)
                ? json_decode($latestDetail->current_location, true)
                : $latestDetail->current_location; // Use directly if it's already an array

            // Ensure latitude and longitude are available
            return response()->json([
                'latitude' => $currentLocation['latitude'] ?? null,
                'longitude' => $currentLocation['longitude'] ?? null,
                'latestDetail' => $latestDetail,
            ]);
        }

        return response()->json([
            'message' => 'No location details found.',
            'latitude' => null,
            'longitude' => null,
        ]);
    }
}
