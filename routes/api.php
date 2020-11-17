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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['middleware' => ['json.response']], function () {
    // public routes
    //THIS IS THE WAY OF WRITING THE ROUTES IN LARAVEL 8 (LIKE AN ARRAY)!!!
    Route::post('/login', [\App\Http\Controllers\Auth\ApiAuthController::class, 'login'])->name('login.api');
    Route::post('/register', [\App\Http\Controllers\Auth\ApiAuthController::class, 'register'])->name('register.api');
    Route::get('/companies', [App\Http\Controllers\CompanyController::class, 'index']);
    Route::get('/companies/{company}', [App\Http\Controllers\CompanyController::class, 'show']);
    Route::get('/companies/{company_id}/form', [\App\Http\Controllers\FormController::class, 'getForm']);
    Route::post('/companies/{company_id}/form', [\App\Http\Controllers\FormController::class, 'saveForm']);
});

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [\App\Http\Controllers\Auth\ApiAuthController::class, 'logout'])->name('logout.api');
});


Route::middleware(['cors','auth:api'])->group(function (){
    //Companies requests:
    Route::post('/companies', [App\Http\Controllers\CompanyController::class, 'store']);
    Route::put('/companies/{company}', [App\Http\Controllers\CompanyController::class, 'update']);
    Route::delete('/companies/{company}', [App\Http\Controllers\CompanyController::class, 'delete']);
    Route::get('/{user_id}/companies',[\App\Http\Controllers\CompanyController::class, 'getCompaniesByUserId']);
});

Route::middleware(['cors','auth:api'])->group(function (){
    //Employees requests:
    Route::get('/employees/{employee}', [App\Http\Controllers\EmployeeController::class, 'show']);
    Route::post('/employees', [App\Http\Controllers\EmployeeController::class, 'store']);
    Route::put('/employees/{employee}', [App\Http\Controllers\EmployeeController::class, 'update']);
    Route::delete('/employees/{employee}', [App\Http\Controllers\EmployeeController::class, 'delete']);
    Route::get('/{company_id}/employees',[\App\Http\Controllers\EmployeeController::class, 'getEmployeesByCompanyId']);
});
