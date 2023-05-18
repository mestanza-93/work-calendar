<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;


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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/test', function () {
    return view('test');
});
Route::get('/employees', function () {
    return view('test');
})->name('employees');
Route::get('/calendar', function () {
    return view('test');
})->name('calendar');


// Route::get('/companies', 'CompanyController@all')->name('companies');

// Route::controller(CompanyController::class)->group(function () {
//     Route::get('/companies/all', 'all');
// });

Route::prefix('/companies')->group(function () {
    Route::get('/', [CompanyController::class, 'all']);

    Route::prefix('/{alias}')->group(function () {
        Route::get('/', [CompanyController::class, 'getByAlias']);
        Route::get('/companies', [CompanyController::class, 'getByAlias']);
        Route::get('/employees', [CompanyController::class, 'getByAlias']);
    });
});