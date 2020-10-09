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
Route::get('/test', [App\Http\Controllers\FirebaseController::class, 'index']);

//Company
Route::get('/companies', [App\Http\Controllers\CompanyController::class,'index']);
Route::get('/companies/{company}', [App\Http\Controllers\CompanyController::class, 'show']);
Route::post('/companies', [App\Http\Controllers\CompanyController::class, 'store']);
Route::put('/companies/{company}', [App\Http\Controllers\CompanyController::class, 'update']);
Route::delete('/companies/{company}', [App\Http\Controllers\CompanyController::class, 'delete']);
