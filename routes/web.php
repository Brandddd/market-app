<?php

use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// -------------------- WEB Route home --------------------
Route::get('/', [CategoryController::class, 'showCategoriesWithProducts'])->name('home');

// -------------------- WEB Routes for Products --------------------
Route::group(['prefix' => 'Products', 'controller' => ProductController::class], function ()
{
	Route::get('/', 'showTableProducts')->name('products');
	Route::get('/GetAProduct/{product}', 'getAProduct');
	Route::post('/CreateAProduct', 'createAProduct');
	Route::post('/UpdateAProduct/{product}', 'updateAProduct');  // Update
	Route::delete('/DeleteAProduct/{product}', 'deleteAProduct');
});

// -------------------- WEB Routes for Users --------------------
Route::group(['prefix' => 'Users', 'controller' => UserController::class], function ()
{
	Route::get('/', 'getAllUsers')->name('users');
});

// -------------------- WEB Routes for Sales --------------------
Route::group(['prefix' => 'Sales', 'controller' => SaleController::class], function ()
{
	Route::get('/', '')->name('sales');
});

// -------------------- WEB Routes for Categories --------------------
Route::group(['prefix' => 'Categories', 'controller' => CategoryController::class], function ()
{
	Route::get('/GetAllCategories', 'getAllCategories');
});

// -------------------- Auth Rutes ----------------------
Auth::routes();
