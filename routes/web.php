<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PrivecyController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\ServiceStudioController;
use App\Http\Controllers\TermUserController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    Route::prefix('cms')->middleware('guest:admin,store')->group(function () {
        Route::get('{guard}/login', [AuthController::class, 'showLogin'])->name('cms.login');
        Route::post('login', [AuthController::class, 'login']);
    });

    Route::prefix('email')->middleware('auth:admin,store')->group(function () {
        Route::get('verify', [VerifyEmailController::class, 'notice'])->name('verification.notice');
        Route::post('verification-notification', [VerifyEmailController::class, 'send'])->middleware(['throttle:6,1'])->name('verification.send');
        Route::get('verify/{id}/{hash}', [VerifyEmailController::class, 'verify'])->middleware(['signed'])->name('verification.verify');
    });

    Route::middleware('guest')->group(function () {
        Route::get('/forgot-password', [ResetPasswordController::class, 'requestPasswordReset'])->name('password.request');
        Route::post('/forgot-password', [ResetPasswordController::class, 'sendResetEmail'])->name('password.email');
        Route::get('/reset-password/{token}', [ResetPasswordController::class, 'resetPassword'])->name('password.reset');
        Route::post('/reset-password', [ResetPasswordController::class, 'updatePassword'])->name('password.update');
    });

    Route::prefix('cms/admin/')->middleware('auth:admin,store')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('cms.dashboard');
        Route::get('/lang', [DashboardController::class, 'changeLanguage'])->name('cms.dashboard.language');

        /*
        |--------------------------------------------------------------------------
        | Roles & Permissions Routes
        |--------------------------------------------------------------------------
        */

        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        Route::resource('permissions/role', RolePermissionController::class);

    // /**
    //  * --------------------------------------------
    //  *  Admin Route Controller
    //  * --------------------------------------------
    //  */
    Route::resource('admins',AdminController::class);
    // /**
    //  * --------------------------------------------
    //  *  Country Route Controller
    //  * --------------------------------------------
    //  */
    Route::resource('countries',CountryController::class);
    // /**
    //  * --------------------------------------------
    //  *  City Route Controller
    //  * --------------------------------------------
    //  */
    Route::resource('cities',CityController::class);
    // /**
    //  * --------------------------------------------
    //  *  Region Route Controller
    //  * --------------------------------------------
    //  */
    Route::resource('regions',RegionController::class);
    // /**
    //  * --------------------------------------------
    //  *  Service Studio Route Controller
    //  * --------------------------------------------
    //  */
    Route::resource('service_studios',ServiceStudioController::class);
    //  /**
    //  * --------------------------------------------
    //  *  Privecy Route Controller
    //  * --------------------------------------------
    //  */
    // Route::resource('privecies',PrivecyController::class);
    //  /**
    //  * --------------------------------------------
    //  *  TermUser Route Controller
    //  * --------------------------------------------
    //  */
    // Route::controller(TermUserController::class)->group(function(){
    //     Route::get('term_users','index');
    //     Route::post('term_users','store');
    //     Route::put('term_users/{term_user}','update');
    // });
    //  /**
    //  * --------------------------------------------
    //  *  AboutUs Route Controller
    //  * --------------------------------------------
    //  */
    // Route::controller(AboutUsController::class)->group(function(){
    //     Route::get('about_us','index');
    //     Route::post('about_us','store');
    //     Route::put('about_us/{about_us}','update');
    // });
        
    });
});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::prefix('cms/admin/')->middleware('auth:admin,store')->group(function () {

            // Store
            Route::get('profile/logo-and-image', [AuthController::class, 'logoAndImage'])->name('cms.profile.logo-and-image');
            Route::put('profile/logo-and-image', [AuthController::class, 'storeImageAndCover']);

            Route::get('profile/category', [AuthController::class, 'showCategory'])->name('cms.profile.category');
            // Route::get('profile/day-work', [AuthController::class, 'editPassword'])->name('cms.profile.day-work');
            Route::get('profile/region-info', [AuthController::class, 'showRegionInfo'])->name('cms.profile.region-info');
            Route::put('profile/region-info', [AuthController::class, 'editRegionInfo']);

            Route::get('profile/personal', [AuthController::class, 'profilePersonalInformatiion'])->name('cms.profile.personal-information');
            Route::put('profile/personal', [AuthController::class, 'updateProfilePersonalInformation'])->name('cms.profile.update-personal-information');

            Route::get('profile/account', [AuthController::class, 'profileAccountInformatiion'])->name('cms.profile.account-information');

            Route::get('profile/change-password', [AuthController::class, 'editPassword'])->name('cms.profile.change-password');

            Route::post('change-password', [AuthController::class, 'updatePassword']);

            Route::get('logout', [AuthController::class, 'logout'])->name('cms.logout');
        });
    }
);
