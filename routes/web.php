<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\CommercialController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::controller(AuthController::class)->group(function () {
    Route::get('login',  "LoginForm")->name('login');
    Route::post('loginf',  "Login")->name(name: 'loginf');
});


Route::prefix('admin')->middleware(["auth"])->name('admin.')->group(function(){
    Route::get('/' , function() {
        return view('admin.index');
    });
    Route::resource('commercial' , CommercialController::class);
});
