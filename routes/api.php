<?php

use App\Http\Controllers\Api\AccountController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CustomController;
use App\Http\Controllers\Api\CustomerCarController;
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
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);
Route::get('/device', [AuthController::class, 'device']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::get('/setting', function () {
//   return "dad";
//});

//Setting
Route::get('/setting', [SettingsController::class, 'index']);
Route::get('/cities', [SettingsController::class, 'cities']);
Route::get('/towns', [SettingsController::class, 'towns']);
Route::get('/distincs', [SettingsController::class, 'distincs']);
Route::get('/cars', [SettingsController::class, 'cars']);
Route::get('/neighbourhoods', [SettingsController::class, 'neighbourhoods']);
Route::get('/brands', [\App\Http\Controllers\Api\BrandController::class, 'index']);
Route::get('/page', [SettingsController::class, 'page']);
Route::get('/page_category', [SettingsController::class, 'page_category']);
Route::post('/register', [AuthController::class, 'register'])->name('register');

//Customer
Route::get('/customer', [CustomerController::class, 'index']);
Route::get('/customer/{id}', [CustomerController::class, 'show/{id}'])->name('customer.id');


Route::get('getversion', [CustomController::class, 'getversion'])->name('getversion');
Route::get('getcar', [CustomController::class, 'getcar'])->name('getcar');
Route::get('/pages', [\App\Http\Controllers\Api\CustomController::class, 'pages']);


Route::resource('vehicle_request', VehicleRequest::class);
Route::get('/years', [\App\Http\Controllers\Api\CustomController::class, 'years']);
Route::get('/models', [\App\Http\Controllers\Api\CustomController::class, 'models']);
Route::get('/onlymodel', [\App\Http\Controllers\Api\CustomController::class, 'onlymodel']);
Route::get('/fuels', [\App\Http\Controllers\Api\CustomController::class, 'fuels']);
Route::get('/bodys', [\App\Http\Controllers\Api\CustomController::class, 'bodys']);
Route::get('/versions', [\App\Http\Controllers\Api\CustomController::class, 'versions']);
Route::get('/colors', [\App\Http\Controllers\Api\CustomController::class, 'colors']);
Route::get('/citys', [\App\Http\Controllers\Api\CustomController::class, 'citys']);
Route::get('/town', [\App\Http\Controllers\Api\CustomController::class, 'town']);

Route::get('/cacheflush', [\App\Http\Controllers\Api\CustomController::class, 'Cacheflush']);

Route::get('form1', [CustomerCarController::class, 'form1'])->name('form1');
Route::post('form2', [CustomerCarController::class, 'form2'])->name('form2');
Route::post('form3', [CustomerCarController::class, 'form3'])->name('form3');
Route::post('form4', [CustomerCarController::class, 'form4'])->name('form4');
Route::get('form5', [CustomerCarController::class, 'form5'])->name('form5');
Route::post('customer_car.file_store', [CustomerCarController::class, 'dropzoneStore'])->name('customer_car.file_store');


 
Route::post('addFavorite', [AccountController::class, 'customer_car_id_follow'])->name('follow');
Route::post('removeFavorite', [AccountController::class, 'customer_car_id_un_follow'])->name('unFfollow');
Route::post('change_password', [AccountController::class, 'password_update'])->name('change_password');
Route::post('account_update', [AccountController::class, 'account_update'])->name('account_update');
Route::get('mycars', [AccountController::class, 'mycars'])->name('mycars');
Route::post('letMeCar', [AccountController::class, 'letMeCar'])->name('letMeCar');
Route::post('formSave', [AccountController::class, 'formSave'])->name('formSave');
Route::get('letMeCarList', [AccountController::class, 'letMeCarList'])->name('letMeCarList');
Route::post('carBuys', [AccountController::class, 'carBuys'])->name('carBuys');
Route::post('carBuysList', [AccountController::class, 'carBuysList'])->name('carBuysList');
Route::get('getFavorites', [AccountController::class, 'getFollow'])->name('getFavorites');
Route::post('imageUpload', [CustomerCarController::class, 'imageUpload'])->name('imageUpload');

Route::post('repassword', [AccountController::class, 'repassword'])->name('repassword');
Route::post('change_password', [AccountController::class, 'change_password'])->name('change_password');


Route::delete('letMeCarDelete', [AccountController::class, 'letMeCarDelete'])->name('letMeCarDelete');


Route::get('customer_car_valuation', [CustomerCarController::class, 'customer_car_valuation'])->name('customer_car_valuation');
Route::post('customer_car_valuation_confirm', [CustomerCarController::class, 'customer_car_valuation_confirm'])->name('customer_car_valuation_confirm');


Route::resource('notification' , '\App\Http\Controllers\Api\NotificationController');
Route::resource('payment' , '\App\Http\Controllers\Api\PaymentController');
Route::resource('affiliate' , '\App\Http\Controllers\Api\AffiliateController');

