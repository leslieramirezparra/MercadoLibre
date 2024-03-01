<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;



Auth::routes();
Route::get('/', [CategoryController::class, 'home'])->name('home');
Route::get('/product', [ProductController::class, 'home'])->name('products.home');

Route::get('/category/{category}', [CategoryController::class, 'AllCategories'])
	->name('category.show');

Route::get('/product/{product}', [ProductController::class, 'AllProducts'])
	->name('product.show');
Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::get('/home',[HomeController::class,'index'])
	->name('home');

Route::group(['middleware'=>['auth']],function(){
    Route::get('/home', [HomeController::class, 'index'])
    ->name('home');

    // Users
    Route::group(['prefix'=>'users', 'middleware'=>['role:admin'],'controller' => UserController::class], function(){
        Route::get('/','index')->name('users.index')->middleware('can:users.index');
        Route::get('/create','create')->name('users.create')->middleware('can:users.create');
        Route::post('/','store')->name('users.store')->middleware('can:users.store');
        Route::get('/{user}/edit','edit')->name('users.edit')->middleware('can:users.edit');
        Route::put('/{user}','update')->name('users.update')->middleware('can:users.update');
        Route::delete('/{user}','destroy')->name('users.destroy')->middleware('can:users.destroy');
    });

    // Products
    Route::group(['prefix'=>'products', 'controller' => ProductController::class], function(){
        Route::get('/','index')->name('products.index')->middleware('can:products.index');
        Route::get('/show/{product}','show')->name('products.show')->middleware('can:products.show');
        Route::post('/store','store')->name('products.store')->middleware('can:products.store');
        Route::post('/update/{product}','update')->name('products.update')->middleware('can:products.update');
        // Route::put('/{book}','update')->name('books.update')->middleware('can:books.update');
        Route::delete('/{product}','destroy')->name('products.destroy')->middleware('can:products.destroy');

		//cart
		Route::get('/product/add-to-cart/{product}', 'addToCart')->name('product.add-to-cart');
    });

    // Categories
    Route::group(['prefix'=>'categories', 'controller' => CategoryController::class], function(){
        Route::get('/','index')->name('categories.index')->middleware('can:categories.index');
		// Route::get('/','viewUser')->name('categories.viewUser')->middleware('can:categories.viewUser');
        Route::get('/get-all','index')->name('categories.get-all')->middleware('can:categories.get-all');
        Route::get('/get-all-dt','getAll')->name('categories.get-all-dt');
        Route::get('/{category}','show')->name('categories.show');
        Route::post('/','store')->name('categories.store')->middleware('can:categories.store');
        Route::put('/{category}','update')->name('categories.update')->middleware('can:categories.update');
        Route::delete('/{category}','destroy')->name('categories.destroy')->middleware('can:categories.destroy');
    });
	//Cart
	Route::group(['prefix' => 'cart_item', 'middleware', 'controller' => CartController::class], function () {
		Route::get('/cart', 'index')->name('cart.index');
		Route::put('/cart/update/{id}', 'update')->name('cart.update');
		Route::delete('/cart/remove/{id}', 'destroy')->name('cart.destroy');
		Route::delete('/cart/clear', 'clear')->name('cart.clear');
	});
});
