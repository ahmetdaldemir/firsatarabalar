<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\SettingsController;
use App\Http\Controllers\Api\VehicleRequest;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::get('/setting', function () {
//   return "dad";
//});
Route::get('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);
Route::get('/device', [AuthController::class, 'device']);


//Setting
Route::get('/setting', [SettingsController::class, 'index']);
Route::get('/cities', [SettingsController::class, 'cities']);
Route::get('/towns', [SettingsController::class, 'towns']);
Route::get('/distincs', [SettingsController::class, 'distincs']);
Route::get('/cars', [SettingsController::class, 'cars']);
Route::get('/neighbourhoods', [SettingsController::class, 'neighbourhoods']);
Route::get('/brands', [SettingsController::class, 'brands']);
Route::get('/page', [SettingsController::class, 'page']);
Route::get('/page_category', [SettingsController::class, 'page_category']);

//Customer
Route::get('/customer', [CustomerController::class, 'index']);
Route::get('/customer/{id}', [CustomerController::class, 'show/{id}'])->name('customer.id');


Route::resource('vehicle_request',  VehicleRequest::class);

