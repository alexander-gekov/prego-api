<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['cors', 'json.response']], function () {

    // ...

    // public routes
    //THIS IS THE WAY OF WRITING THE ROUTES IN LARAVEL 8 (LIKE AN ARRAY)!!!
    Route::post('/login', [\App\Http\Controllers\Auth\ApiAuthController::class, 'login'])->name('login.api');
    Route::post('/register', [\App\Http\Controllers\Auth\ApiAuthController::class, 'register'])->name('register.api');

});

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [\App\Http\Controllers\Auth\ApiAuthController::class, 'register'])->name('logout.api');
});

//Companies requests:
Route::get('/companies', [App\Http\Controllers\CompanyController::class, 'index']);
Route::get('/companies/{company}', [App\Http\Controllers\CompanyController::class, 'show']);
Route::post('/companies', [App\Http\Controllers\CompanyController::class, 'store']);
Route::put('/companies/{company}', [App\Http\Controllers\CompanyController::class, 'update']);
Route::delete('/companies/{company}', [App\Http\Controllers\CompanyController::class, 'delete']);
