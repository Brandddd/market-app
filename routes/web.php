<?php

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
	Route::get('/', 'showTableUsers')->name('users');
	Route::get('/GetAnUser/{user}', 'getAnUser');
	Route::post('/CreateAnUser', 'createAnUser');
	Route::post('/UpdateAnUser/{user}', 'updateAnUser');
	Route::delete('/DeleteAnUser/{user}', 'deleteAnUser');
});

// -------------------- WEB Routes for Sales --------------------
Route::group(['prefix' => 'Sales', 'controller' => SaleController::class], function ()
{
	Route::get('/ShoppingCart', 'showShoppingCart')->name('list-cart');
	Route::get('/AddProductToCart/{product}', 'addProductToCart');
});

// -------------------- WEB Routes for Categories --------------------
Route::group(['prefix' => 'Categories', 'controller' => CategoryController::class], function ()
{
	Route::get('/GetAllCategories', 'getAllCategories');
	Route::get('/GetAllProductsByCategory/{category}', 'getAllProductsByCategory');
});

// -------------------- Auth Rutes ----------------------
Auth::routes();
