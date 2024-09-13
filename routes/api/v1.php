
<?php

use App\Http\Controllers\Api\Auth\CommercialAuth;
use App\Http\Controllers\Api\V1\Commercial\CommandController;
use App\Http\Controllers\Api\V1\YourController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    //
    Route::controller(CommercialAuth::class)->group(function() {
        Route::post('login' , 'login');
    });

    //
    Route::middleware(['auth:api','commercialAuth'])->group(function () {
        Route::controller(CommandController::class)->group(function () {
            Route::get('MyCommands' , "MyCommands");
            Route::post('TakCommand/{command}' , "TakCommand");
            Route::post('AddLocation/{command}' , "AddLocation");
        });
    });
});
