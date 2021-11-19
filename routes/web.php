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

        Route::get('dashboard', [\App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('Dashboard');

    });

});
