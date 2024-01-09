<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BranchController;
use App\Http\Controllers\Api\CarsController;
use App\Http\Controllers\Api\CarSpecificController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\OrderDetailsController;
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

//Public API's
Route::post('/login', [AuthController::class, 'login'])->name('user.login');
Route::post('/user', [UserController::class, 'store']);
Route::get('/cars', [CarsController::class, 'index']);
Route::get('/cars/{id}', [CarsController::class, 'show']);
Route::get('/branch', [BranchController::class, 'index']);
Route::get('/branch/{id}', [BranchController::class, 'show']);


//Private API's
Route::middleware(['auth:sanctum'])->group(function () {
Route::get('/logout', [AuthController::class, 'logout']);


//Admin API's
    Route::controller(CarsController::class)->group(function () {
        Route::post('/cars',            'store');
        Route::put('/cars/{id}',        'update');
        Route::put('/cars/image/{id}',  'image');
        Route::delete('/cars/{id}',     'destroy');
    });

    Route::controller(BranchController::class)->group(function () {
        Route::post('/branch',            'store');
        Route::put('/branch/{id}',        'update');
        Route::delete('/branch/{id}',     'destroy');
    });
    
    Route::controller(UserController::class)->group(function () {
        Route::get('/user',                     'index');
        Route::get('/user/{id}',                'show'); 
        Route::put('/user/{id}',                'update');
        Route::put('/user/email/{id}',          'email');
        Route::put('/user/phone/{id}',          'phone_number');
        Route::put('/user/address/{id}',        'address');
        Route::put('/user/password/{id}',       'password');
        Route::put('/user/image/{id}',          'image');
        Route::delete('/user/{id}',             'destroy');
    });

    Route::controller(OrderController::class)->group(function(){
        Route::get('/order',                    'index');
        Route::post('/order',                   'store');
        Route::put('/order/{id}',              'update');
        Route::delete('order/{id}',            'destroy');

    });

    Route::controller(OrderDetailsController::class)->group(function(){
        Route::get('/orderdetails',             'index');

    });

    Route::controller(InventoryController::class)->group(function(){
        Route::get('inventory',                 'index');
        Route::post('inventory',                'store');
    });

    //user specific

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile/show',                     'show');
        Route::put('/profile/image',                     'image')->name('profile.image');
    });

    //CarSpecific

    Route::controller(CarSpecificController::class)->group(function () {
        Route::get('/car/profile/show',                     'show');
        //Route::put('/profile/image',                     'image')->name('profile.image');
    });
});