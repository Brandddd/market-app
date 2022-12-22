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
use Illuminate\Support\Facades\Route;

// -------------------- WEB Route home --------------------
Route::get('/', [CategoryController::class, 'showCategoriesWithProducts'])->name('home');

// -------------------- WEB Routes for Products --------------------
Route::group(['prefix' => 'Products', 'controller' => ProductController::class], function ()
{
	Route::get('/', 'showTableProducts')->name('products');
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
	//
});

// ----- Routes for Login ------
Route::group(['controller' => LoginController::class], function () {
	// Login Routes...
	Route::get('login', 'showLoginForm')->name('login');
	Route::post('login', 'login');
	// Logout Routes...
	Route::post('logout', 'logout')->name('logout');
});

// Registration Routes...
Route::group(['controller' => ForgotPasswordController::class], function () {
	// Forgot Pasword reset routes...
	Route::get('password/reset', 'showLinkRequestForm')->name('password.request');

	Route::post('password/email', 'sendResetLinkEmail')->name('password.email');
});

Route::group(['controller' => ResetPasswordController::class], function () {
	// Password Reset Routes...
	Route::get('password/reset/{token}', 'showResetForm')->name('password.reset');
	Route::post('password/reset', 'reset')->name('password.update');
});

Route::group(['controller' => ConfirmPasswordController::class], function () {
	// Password Confirmation Routes...
	Route::get('password/confirm', 'showConfirmForm')->name('password.confirm');
	Route::post('password/confirm', 'confirm');
});

Route::group(['controller' => VerificationController::class], function () {
	// Email Verification Routes...
	Route::get('email/verify', 'show')->name('verification.notice');
	Route::get('email/verify/{id}/{hash}', 'verify')->name('verification.verify');
	Route::post('email/resend', 'resend')->name('verification.resend');
});
