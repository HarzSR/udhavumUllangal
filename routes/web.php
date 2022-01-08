<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/admin')->namespace('Admin')->group(function (){

    // Admin Routes

    Route::match(['get', 'post'], '/', [\App\Http\Controllers\Admin\AdminController::class, 'login'])->name('Login');

    Route::group(['middleware' => ['admin']], function () {

        // Protected Routes

        // Dashboard Routes

        Route::get('dashboard', [\App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('Dashboard');
        Route::get('profile', [\App\Http\Controllers\Admin\AdminController::class, 'profile'])->name('Profile');
        Route::post('check-current-password', [\App\Http\Controllers\Admin\AdminController::class, 'checkPwd']);
        Route::post('update-pwd', [\App\Http\Controllers\Admin\AdminController::class, 'profileUpdate']);
        Route::get('logout', [\App\Http\Controllers\Admin\AdminController::class, 'logout']);

        // Donor Routes

        Route::match(['get', 'post'], '/add-donor', [\App\Http\Controllers\Admin\DonorController::class, 'addDonor'])->name('Add Individual Donor');
        Route::match(['get', 'post'], '/add-corporate-donor', [\App\Http\Controllers\Admin\DonorController::class, 'addCorporateDonor'])->name('Add Corporate Donor');
        Route::get('/view-donors', [\App\Http\Controllers\Admin\DonorController::class, 'viewDonor'])->name('View Donor');
        Route::post('/update-donor-status', [\App\Http\Controllers\Admin\DonorController::class, 'updateDonorStatus']);

    });

});
