<?php

use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\DevisController;
use App\Http\Controllers\Admin\FactureController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PayementController;
use App\Http\Controllers\Admin\RemiseController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\TailwickController;
use Illuminate\Support\Facades\Route;


Route::permanentRedirect('/', '/admin');
Route::get('index/{locale}', [TailwickController::class, 'lang']);

Route::middleware([config('jetstream.auth_session'), 'verified',])->name("admin.")->prefix("admin")->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get("/", 'index')->name('index');
    });
    Route::resource("client", ClientController::class);

});
