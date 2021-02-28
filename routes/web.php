<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\FarmController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\FarmerController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AnimalCatController;
use App\Http\Controllers\Admin\CommunityController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AnimalInfoController;
use App\Http\Controllers\Admin\CommunityCatController;
use App\Http\Controllers\Admin\ReproductionController;
use App\Http\Controllers\Admin\DiseaseHealthController;
use App\Http\Controllers\Admin\ServiceRecordController;
use App\Http\Controllers\Admin\ProductionRecordController;

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

Route::get('/t', function () {
    // $ip = geoip()->getClientIP();
    // $geoInfo = geoip()->getLocation($ip);
    // dd($geoInfo);

    // return PurchaseInvoice::with('productCal')->get();

});

Route::middleware(['auth','admin'])->prefix('admin')->group(function(){
    Route::post('logged_in', [LoginController::class, 'authenticate']);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/visitor_info', [DashboardController::class, 'VisitorInfo'])->name('VisitorInfo');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/laraDashboard', [AuthController::class, 'laraDashboard'])->name('laraDashboard');

    // User Start________________________________________________________________________________________________________________
    Route::resource('/admin-user', AdminUserController::class);
    // Route::post('/admin-user/destroy/{id}', [AdminUserController::class, 'destroy'])->name('admin.destroy');
    Route::post('/admin-user/user-file-store', [AdminUserController::class, 'userFileStore'])->name('admin.userFileStore');
    Route::post('/admin-user/file/destroy/{id}', [AdminUserController::class, 'userFileDestroy'])->name('admin.userFileDestroy');

    Route::resource('/farmer', FarmerController::class);
    Route::post('/farmer/user-file-store', [AdminUserController::class, 'userFileStore'])->name('farmer.userFileStore');
    Route::post('/farmer/file/destroy/{id}', [AdminUserController::class, 'userFileDestroy'])->name('farmer.userFileDestroy');

    Route::resource('/farm', FarmController::class);
    Route::resource('/community-cat', CommunityCatController::class);
    Route::resource('/community', CommunityController::class);

    Route::resource('/animal-info', AnimalInfoController::class);
    Route::get('/get-community', [AnimalInfoController::class, 'getCommunity'])->name('animalInfo.getCommunity');



    Route::resource('/animal-cat', AnimalCatController::class);
    Route::get('/get-animal-cat', [AnimalCatController::class, 'getAnimalCat'])->name('getAnimalCat');
    Route::post('animal-sub-cat/store', [AnimalCatController::class, 'SubCatStore'])->name('animalCat.SubCatStore');
    Route::get('animal-sub-sub-cat/{id}', [AnimalCatController::class, 'subEdit'])->name('animalCat.subEdit');
    Route::post('animal-sub-sub-cat/{id}', [AnimalCatController::class, 'subUpdate'])->name('animalCat.subUpdate');

    Route::resource('/production-record', ProductionRecordController::class);
    Route::resource('/reproduction-record', ReproductionController::class);
    Route::get('/get-animal-info', [ProductionRecordController::class, 'getAnimalInfo'])->name('animalInfo.getAnimalInfo');

    Route::resource('/service-record', ServiceRecordController::class);

    Route::resource('/disease-and-health', DiseaseHealthController::class);







});


Route::get('/', 'App\Http\Controllers\Frontend\IndexController@index')->name('index');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
