<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\CustomController;
use App\Http\Controllers\DropzoneController;
use App\Http\Controllers\Modules\Admin\CarController;
use App\Http\Controllers\Modules\Admin\CustomerCarController;
use App\Http\Controllers\CustomerCarController as ViewCustomerCarController;
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
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('nasil_calisir', [ViewController::class, 'how_run_system'])->name('nasil_calisir');
Route::get('kullanici_gorusleri', [ViewController::class, 'customer_comment'])->name('kullanici_gorusleri');

Route::middleware(['customer_auth', 'user-access:customer'])->group(function () {
    Route::get('arac-sat', [ViewController::class, 'carSell'])->name('arac-sat');
});

Route::get('form1', [ViewCustomerCarController::class, 'form1'])->name('form1');
Route::post('form2', [ViewCustomerCarController::class, 'form2'])->name('form2');
Route::post('form3', [ViewCustomerCarController::class, 'form3'])->name('form3');
Route::post('form4', [ViewCustomerCarController::class, 'form4'])->name('form4');
Route::get('form5', [ViewCustomerCarController::class, 'form5'])->name('form5');
Route::post('customer_car.file_store', [ViewCustomerCarController::class, 'dropzoneStore'])->name('customer_car.file_store');



Route::get('getmodel', [CustomController::class, 'models'])->name('getmodel');
Route::get('getdistricts', [CustomController::class, 'districts'])->name('getdistricts');
Route::get('getversion', [CrudController::class, 'getversion'])->name('getversion');
Route::get('getcar', [CrudController::class, 'getcar'])->name('getcar');
Route::get('getbody', [CrudController::class, 'getbody'])->name('getbody');
Route::get('getfuel', [CrudController::class, 'getfuel'])->name('getfuel');
Route::get('getversionlist', [CrudController::class, 'getversionlist'])->name('getversionlist');
Route::get('mailsend', [CrudController::class, 'mailsend'])->name('mailsend');



Route::post('kayit-ol', [AuthController::class, 'register'])->name('kayit-ol');







Route::get('sayfalar', [ViewController::class, 'pages'])->name('sayfalar');
Route::post('vehiclerequest', [CrudController::class, 'vehiclerequest'])->name('vehiclerequest');




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


Route::middleware(['customer_auth'])->group(function () {
    Route::get('/profil', [AccountController::class, 'profil'])->name('profil');
    Route::post('/account.customer.update', [AccountController::class, 'account_update'])->name('account.customer.update');
    Route::post('/account.customer.password.update', [AccountController::class, 'password_update'])->name('account.customer.password.update');
    Route::get('/account.customer.customer_car_id_follow', [AccountController::class, 'customer_car_id_follow'])->name('account.customer.customer_car_id_follow');
    Route::get('/account.customer.customer_car_id_un_follow', [AccountController::class, 'customer_car_id_un_follow'])->name('account.customer.customer_car_id_un_follow');
    Route::get('/account.customer.follow', [AccountController::class, 'follow'])->name('account.customer.follow');
    Route::get('/account.customer.car', [AccountController::class, 'car'])->name('account.customer.car');

});
