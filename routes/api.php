<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\emailverviin;
use App\Http\Controllers\location;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\prodectController;
use App\Http\Controllers\UserAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::controller(BrandController::class)->prefix('/brand') -> group(function () {
   
    Route::post('/create', 'store');
    Route::post('/update/{id}', 'update');
    Route::get('/data', 'index');
    Route::delete('/delete/{id}', 'delete');


    
});
Route::middleware('auth:sanctum') -> controller(CategoryController::class)->prefix('/catagory') -> group(function () {
   
    Route::post('/create', 'store');
    Route::post('/update/{id}', 'update');
    Route::get('/data', 'index');
    Route::delete('/delete/{id}', 'delete');

    
});
Route::post('/location',[location::class, 'create'])->middleware('auth:sanctum');
Route::post('/order',[OrderController::class, 'store'])->middleware('auth:sanctum');
Route::get('/orders',[OrderController::class, 'index'])->middleware('auth:sanctum');


Route::post('email-versvection', [emailverviin::class, 'loginOtp'])->middleware('auth:sanctum');
Route::get('email-versvection', [emailverviin::class, 'sendEmailverction'])->middleware('auth:sanctum');

Route::controller(UserAuthController::class)->prefix('/auth')->group(function (){
    Route::get('/logingithup', 'logingithup');
    Route::get('/redirect', 'redirect');
});
Route::post('register',[UserAuthController::class,'register']);
Route::post('login',[UserAuthController::class,'login']);
Route::post('logout',[UserAuthController::class,'logout'])
  ->middleware('auth:sanctum');
Route::controller(prodectController::class)->prefix('/produect') -> group(function () {
   
    Route::post('/create', 'store');
    Route::post('/update/{id}', 'update');
    Route::get('/data', 'index');
    Route::delete('/delete/{id}', 'delete');
    Route::get('/show/{id}', 'show');


    
});


