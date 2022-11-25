<?php

use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\DataToAuthController;
use App\Http\Controllers\Api\HearAboutController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\PlanController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\StoreController;
use App\Http\Controllers\Api\SubCategoryController;
use App\Http\Controllers\Api\SubSubCategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::middleware('guest')->prefix('v1')->group(function(){
    Route::post('/auth/register', [ApiAuthController::class , 'register']);
    Route::post('/auth/login', [ApiAuthController::class , 'login']);
    Route::post('/auth/reset', [ApiAuthController::class , 'resetPassword']);
    Route::post('/auth/forget-password', [ApiAuthController::class , 'forgetPassword']);
    Route::post('/auth/check-code-reset', [ApiAuthController::class , 'checkResetPasswordCode']);

});


Route::prefix('v1')->middleware('auth:user-api')->group(function(){

    Route::post('/auth/send-code', [ApiAuthController::class , 'sendVerifiyCode']);
    Route::post('/auth/check-code', [ApiAuthController::class , 'checkCode']);
    Route::post('auth/logout',[ApiAuthController::class , 'logout']);


    
});

    
