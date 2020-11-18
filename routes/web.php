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

//Company
Route::get('/companies', [App\Http\Controllers\CompanyController::class,'index']);
Route::get('/companies/{company}', [App\Http\Controllers\CompanyController::class, 'show']);
Route::post('/companies', [App\Http\Controllers\CompanyController::class, 'store']);
Route::put('/companies/{company}', [App\Http\Controllers\CompanyController::class, 'update']);
Route::delete('/companies/{company}', [App\Http\Controllers\CompanyController::class, 'delete']);
Route::get('/{user_id}/companies',[App\Http\Controllers\CompanyController::class, 'getCompaniesByUserId']);
Route::get('/{user_id}/company',[App\Http\Controllers\CompanyController::class, 'getCompanyByManager']);

