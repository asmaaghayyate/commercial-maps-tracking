<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\CommandController;
use App\Http\Controllers\Admin\CommercialController;
use App\Http\Controllers\Admin\DepartementController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('/admin');
});

Route::permanentRedirect('/', '/admin');

Route::controller(AuthController::class)->group(function () {
    Route::get( 'login',  "LoginForm")->name('login')->middleware('guest');
    Route::post('loginf',  "Login")->name('loginf');
    Route::post('logout',  "logout")->name('logout');
    Route::get( '/password/reset',  "forgetlogin")->name('password.request')->middleware('guest');
    Route::post('/password/email',  "sendResetLinkEmail")->name('password.email');

    Route::get( 'password/reset/{token}/{email}',  "showResetForm")->name('password.reset')->middleware('guest');
   
    Route::post('/password/update',  "passwordupdate")->name('password.update');

  
});

Route::prefix('admin')->middleware(["auth"])->name('admin.')->group(function(){
    Route::get('/' , function() {
        return view('admin.index');
    });
    Route::resource('commercial' , CommercialController::class);
    Route::resource('client' , ClientController::class);

    Route::resource('departement' , DepartementController::class);
    Route::resource('command' , CommandController::class);

    Route::resource('admin' , AdminController::class);

});








