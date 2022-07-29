<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Modules\Admin\CarController;
use App\Http\Controllers\Modules\Admin\CustomerCarController;
use App\Http\Controllers\Modules\Admin\CustomerController;
use App\Http\Controllers\Modules\Admin\UserController;
use App\Http\Controllers\Modules\Admin\PageController;
use App\Http\Controllers\Modules\Admin\SettingsController;
use App\Http\Controllers\Modules\Admin\ValuationController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

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

Route::get('/', [ViewController::class, 'index']);
Route::get('iletisim', [ViewController::class, 'contact'])->name('iletisim');
Route::post('giris-yap', [AuthController::class, 'login'])->name('giris-yap');
Route::get('nasil_calisir', [ViewController::class, 'how_run_system'])->name('nasil_calisir');
Route::get('kullanici_gorusleri', [ViewController::class, 'customer_comment'])->name('kullanici_gorusleri');

Route::middleware(['customer_auth', 'user-access:customer'])->group(function () {
    Route::get('arac-sat', [ViewController::class, 'carSell'])->name('arac-sat');
});



 Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::prefix('admin/')->middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('home', [HomeController::class, 'adminHome'])->name('admin.home');


    Route::prefix('expert/')->group(function () {
        Route::get('index', [UserController::class, 'index'])->name('admin.expert.index');
        Route::get('create', [UserController::class, 'create'])->name('admin.expert.create');
        Route::get('edit', [UserController::class, 'form'])->name('admin.expert.edit');
        Route::post('store', [UserController::class, 'store'])->name('admin.expert.store');
    });

    Route::prefix('customer/')->group(function () {
        Route::get('index', [CustomerController::class, 'index'])->name('admin.customer.index');
        Route::get('create', [CustomerController::class, 'create'])->name('admin.customer.create');
        Route::get('edit', [CustomerController::class, 'form'])->name('admin.customer.edit');
        Route::post('store', [CustomerController::class, 'store'])->name('admin.customer.store');
        Route::get('deleted', [CustomerController::class, 'deleted'])->name('admin.customer.deleted');
    });

    Route::prefix('car/')->group(function () {
        Route::get('index', [CarController::class, 'index'])->name('admin.car.index');
        Route::get('create', [CarController::class, 'create'])->name('admin.car.create');
        Route::get('edit', [CarController::class, 'form'])->name('admin.car.edit');
        Route::post('store', [CarController::class, 'store'])->name('admin.car.store');
        Route::get('deleted', [CarController::class, 'destroy'])->name('admin.car.deleted');
    });

    Route::prefix('customer_car_valuation/')->group(function () {
        Route::get('index', [CustomerCarController::class, 'index'])->name('admin.customer_car_valuation.index');
        Route::get('create', [CustomerCarController::class, 'create'])->name('admin.customer_car_valuation.create');
        Route::get('edit', [CustomerCarController::class, 'form'])->name('admin.customer_car_valuation.edit');
        Route::post('store', [CustomerCarController::class, 'store'])->name('admin.customer_car_valuation.store');
        Route::get('deleted', [CustomerCarController::class, 'destroy'])->name('admin.customer_car_valuation.deleted');
        Route::post('store_valuation', [CustomerCarController::class, 'store_valuation'])->name('admin.customer_car_valuation.store_valuation');
    });



    Route::prefix('page/')->group(function () {
        Route::get('index', [PageController::class, 'index'])->name('admin.page.index');
        Route::get('create', [PageController::class, 'create'])->name('admin.page.create');
        Route::get('edit', [PageController::class, 'form'])->name('admin.page.edit');
        Route::post('store', [PageController::class, 'store'])->name('admin.page.store');
        Route::get('deleted', [PageController::class, 'destroy'])->name('admin.page.deleted');
    });



    Route::prefix('setting/')->group(function () {
        Route::get('city/{id}', [SettingsController::class, 'city'])->name('admin.setting.city.{id}');
        Route::get('index', [SettingsController::class, 'index'])->name('admin.setting.index');
        Route::post('save', [SettingsController::class, 'save'])->name('admin.setting.save');

    });

    Route::post('assignmentDo', [CustomerCarController::class, 'assignmentDo'])->name('admin.assignmentDo');




});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {

    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});