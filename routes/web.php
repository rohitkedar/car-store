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
Route::resource('users', App\Http\Controllers\UserController::class);
Route::resource('owners', App\Http\Controllers\OwnerController::class);
Route::resource('categories', App\Http\Controllers\CategorieController::class);
Route::resource('mechanics', App\Http\Controllers\MechanicController::class);
Route::get('/cars/assign-mechanic', [App\Http\Controllers\CarController::class, 'assignMechanic'])->name('assign-mechanic');
Route::post('/cars/getcars', [App\Http\Controllers\CarController::class, 'getCars'])->name('getcars');
Route::post('/cars/storeMechanic', [App\Http\Controllers\CarController::class, 'storeMechanic'])->name('storeMechanic');
Route::resource('cars', App\Http\Controllers\CarController::class);