<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
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

//secured APIs
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('/employee',EmployeeController::class);
    Route::delete('/employee/{id}/delete',[EmployeeController::class,'delete']);
    //user Logout
    Route::post('/logout',[AuthController::class,'logout']);
});

//public APIs
Route::post('/register',[AuthController::class,'register']);
Route::post('/login', [AuthController::class, 'loginUser']);
