<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\CommandController;
use App\Http\Controllers\Admin\CommercialController;
use App\Http\Controllers\Admin\DepartementController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::permanentRedirect('/', '/admin');

Route::controller(AuthController::class)->group(function () {
    Route::get('login',  "LoginForm")->name('login');
    Route::post('loginf',  "Login")->name(name: 'loginf');
    Route::post('logout',  "logout")->name(name: 'logout');
});

Route::prefix('admin')->middleware(["auth"])->name('admin.')->group(function(){
    Route::get('/' , function() {
        return view('admin.index');
    });
    Route::resource('commercial' , CommercialController::class);
    Route::resource('client' , ClientController::class);

    Route::resource('departement' , DepartementController::class);
    Route::resource('command' , CommandController::class);

    Route::resource('user' , AdminController::class);

//Route::delete('admin/{user}', [AdminController::class, 'destroyy'])->name('adminn.destroy');



});








