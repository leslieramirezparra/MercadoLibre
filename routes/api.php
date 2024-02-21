<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthUserAPIController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::middleware('auth:sanctum')->get('/author', function (Request $request) {
//     return $request->author();
// });
// Route::middleware('auth:sanctum')->get('/book', function (Request $request) {
//     return $request->book();
// });
// Route::middleware('auth:sanctum')->get('/category', function (Request $request) {
//     return $request->category();
// });



Route::post('/login',[AuthUserAPIController::class,'login']);
Route::post('/register',[UserController::class,'store']);

// RUTAS PROTEGIDAS
Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::post('/logout',[AuthUserAPIController::class,'logout']);
    Route::get('/profile',[AuthUserAPIController::class,'profile']);

    Route::group(['prefix'=>'users','controller'=>UserController::class],function(){
        Route::get('/','index');
        Route::get('/{user}','show');
        Route::post('/','store');
        Route::put('/{user}','update');
        Route::delete('/{user}','destroy');
    });
    // Route::group(['prefix'=>'authors','controller'=>AuthorController::class],function(){
    //     Route::get('/','index');
    //     Route::get('/{author}','show');
    //     Route::post('/','store');
    //     Route::put('/{author}','update');
    //     Route::delete('/{author}','destroy');
    // });
    // Route::group(['prefix'=>'books','controller'=>BookController::class],function(){
    //     Route::get('/','index');
    //     Route::get('/{book}','show');
    //     Route::post('/','store');
    //     Route::put('/{book}','update');
    //     Route::delete('/{book}','destroy');
    // });
    // Route::group(['prefix'=>'categories','controller'=>CategoryController::class],function(){
    //     Route::get('/','index');
    //     Route::get('/{category}','show');
    //     Route::post('/','store');
    //     Route::put('/{category}','update');
    //     Route::delete('/{category}','destroy');
    // });
});

