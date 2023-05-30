<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------- ----------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/**
 * Login routes
 */
Route::get('/', [UserController::class, 'home'])->name('user.home');
Route::get('/login', [UserController::class, 'login'])->name('user.login.view');
Route::post('/login', [UserController::class, 'checkLogin'])->name('user.login.action');

/**
 * Register routes
 */
Route::get('/register', [UserController::class, 'register'])->name('user.register.view');
Route::post('/register', [UserController::class, 'doRegister'])->name('user.register.action');

Route::get('/employees', function () {
    return view('test');
})->name('employees');
Route::get('/calendar', function () {
    return view('test');
})->name('calendar');
Route::get('/vacances', function () {
    return view('test');
})->name('vacances');



Route::get('/companies', [CompanyController::class, 'all'])->name('companies.all');

Route::prefix('/company')->group(function () {
    Route::prefix('/{alias}')->group(function () {
        Route::get('/', [CompanyController::class, 'getByAlias']);
        Route::get('/employees', [CompanyController::class, 'getByAlias']);
        Route::get('/vacances', [CompanyController::class, 'getByAlias']);
        Route::get('/calendar', [CompanyController::class, 'getByAlias']);
    });
});

