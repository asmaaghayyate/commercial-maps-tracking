<?php

use App\Http\Controllers\Api\IndexController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(IndexController::class)->group(function(){
    Route::get('getLatestLocation/{command}' , "getLatestLocation");
});

require base_path('routes/api/v1.php');
