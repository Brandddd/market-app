<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

// -------------------- WEB Route home --------------------
Route::get('/', [CategoryController::class, 'showCategoriesWithProducts'])->name('home');

// -------------------- WEB Routes for Products --------------------
Route::group([
	'prefix' => 'Products', 'middleware' => ['auth', 'role:admin'],
	'controller' => ProductController::class
], function () {
	Route::get('/', 'showTableProducts')->name('products');
	Route::get('/GetAProduct/{product}', 'getAProduct');
	Route::post('/CreateAProduct', 'createAProduct');
	Route::post('/UpdateAProduct/{product}', 'updateAProduct');  // Update
	Route::delete('/DeleteAProduct/{product}', 'deleteAProduct');
});

// -------------------- WEB Routes for Users --------------------
Route::group([
	'prefix' => 'Users', 'middleware' => ['auth', 'role:admin'],
	'controller' => UserController::class
], function () {
	Route::get('/', 'showTableUsers')->name('users');
	Route::get('/GetAnUser/{user}', 'getAnUser');
	Route::post('/CreateAnUser', 'createAnUser');
	Route::post('/UpdateAnUser/{user}', 'updateAnUser');
	Route::delete('/DeleteAnUser/{user}', 'deleteAnUser');
	Route::get('/GetAllRoles', 'getAllRoles');
});

// -------------------- WEB Routes for Sales --------------------
Route::group(['prefix' => 'Sales', 'controller' => SaleController::class], function () {
	Route::get('/ShoppingCart', 'showShoppingCart')->name('list-cart');
	Route::get('/AddProductToCart/{product}', 'addProductToCart');
});

// -------------------- WEB Routes for Categories --------------------
Route::group(['prefix' => 'Categories', 'controller' => CategoryController::class], function () {
	Route::get('/GetAllProductsByCategory/{category}', 'getAllProductsByCategory');

	Route::group(['middleware' => ['auth', 'role:admin']], function () {
		Route::get('/', 'showCategoriesView')->name('categories');
		Route::post('/CreateCategory', 'createCategory');		// Create category
		Route::get('/GetAllCategories', 'getAllCategories');
		Route::get('/GetCategory/{category}', 'getCategory');
		Route::post('/UpdateCategory/{category}', 'updateCategory');
		Route::delete('/DeleteCategory/{category}', 'deleteCategory');
	});
});

// -------------------- Auth Rutes ----------------------
Auth::routes();

// -------------------- Web Routes for Testing ----------------------
Route::group(['prefix' => 'test', 'controller' => UserController::class], function () {
	// Retornar todos los roles
	// return Role::all()->pluck('name');
	// 2. Asignar roles a los usuarios:
	/* $users = User::get();
	foreach ($users as $user) {
		if ($user->number_id == 1088351988) $user->assignRole('admin');   // Asignacion admin role
		else $user->assignRole('user');   // Asignacion user role
	} */
	// 1. Asi creamos los roles, se accede a la ruta y se crea el rol en base de datos
	/* Role::create(['name' => 'admin']);
	Role::create(['name' => 'user']); */
});
