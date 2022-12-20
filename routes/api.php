<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// --- User Routes ---
Route::group(['prefix' => 'Users', 'controller' => UserController::class], function () {
	Route::post('/CreateAnUser', 'createAnUser'); // Create done
	Route::get('/GetAllUsers', 'getAllUsers');  // Read done
	Route::get('/GetAnUser/{user}', 'getAnUser');  // Read done
	Route::put('/UpdateAnUser/{user}', 'updateAnUser'); // Update done
	Route::delete('/DeleteAnUser/{user}', 'deleteAnUser');  // Delete
});

// --- Product Routes ---
Route::group(['prefix' => 'Products', 'controller' => ProductController::class], function () {
	Route::post('/CreateAProduct', 'createAProduct'); // Create done
	Route::get('/GetAllProducts', 'getAllProducts');  // Read done
	Route::get('/GetAProduct/{product}', 'getAProduct');  // Read done
	Route::put('/UpdateAProduct/{product}', 'updateAProduct'); // Update done
	Route::delete('/DeleteAProduct/{product}', 'deleteAProduct');  // Delete
});

// --- Sale Routes ---
Route::group(['prefix' => 'Sales', 'controller' => SaleController::class], function () {
	// Acá llamamos las rutas
});

// --- Category Routes ---
Route::group(['prefix' => 'Categories', 'controller' => CategoryController::class], function () {
	// Acá llamamos las rutas
});
