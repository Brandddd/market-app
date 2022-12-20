<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Ruta principal
/* Route::get('/', function () {
    return view('welcome');
}); */

Route::view('/', 'home');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
