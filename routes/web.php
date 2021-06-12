<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\FarmController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\FarmerController;
use App\Http\Controllers\Admin\GlobalController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AnimalCatController;
use App\Http\Controllers\Admin\CommunityController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AnimalInfoController;
use App\Http\Controllers\Admin\BodyWeightController;
use App\Http\Controllers\Admin\CommunityCatController;
use App\Http\Controllers\Admin\DistributionController;
use App\Http\Controllers\Admin\MorphometricController;
use App\Http\Controllers\Admin\ReproductionController;
use App\Http\Controllers\Admin\ResearchFarmController;
use App\Http\Controllers\Admin\DiseaseHealthController;
use App\Http\Controllers\Admin\ResearchStockController;
use App\Http\Controllers\Admin\SemenAnalysisController;
use App\Http\Controllers\Admin\ServiceRecordController;
use App\Http\Controllers\Admin\CommunityStockController;
use App\Http\Controllers\Admin\MilkProductionController;
use App\Http\Controllers\Admin\DiseaseTreatmentController;
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

    Route::get('/get-upazila', [GlobalController::class, 'upazila'])->name('get.upazila');
    Route::get('/get-animal-info', [GlobalController::class, 'getAnimalInfo'])->name('get.getAnimalInfo');

    // User Start________________________________________________________________________________________________________________
    Route::resource('/admin-user', AdminUserController::class);
    // Route::post('/admin-user/destroy/{id}', [AdminUserController::class, 'destroy'])->name('admin.destroy');
    Route::post('/admin-user/user-file-store', [AdminUserController::class, 'userFileStore'])->name('admin.userFileStore');
    Route::post('/admin-user/file/destroy/{id}', [AdminUserController::class, 'userFileDestroy'])->name('admin.userFileDestroy');

    Route::resource('/farmer', FarmerController::class);
    Route::post('/farmer/user-file-store', [AdminUserController::class, 'userFileStore'])->name('farmer.userFileStore');
    Route::post('/farmer/file/destroy/{id}', [AdminUserController::class, 'userFileDestroy'])->name('farmer.userFileDestroy');

    Route::resource('/farm', ResearchFarmController::class);
    Route::resource('/community-cat', CommunityCatController::class);
    Route::resource('/community', CommunityController::class);

    // Animal Info
    Route::resource('/animal-info', AnimalInfoController::class);
    Route::get('/get-community', [AnimalInfoController::class, 'getCommunity'])->name('animalInfo.getCommunity');
    Route::get('/get-animal-sub-cat', [AnimalInfoController::class, 'getAnimalCat'])->name('animalInfo.getAnimalCat');
    Route::get('/animal-info-excel', [AnimalInfoController::class, 'exportIntoExcel'])->name('animalInfo.exportIntoExcel');

    // Morphometric
    Route::resource('/morphometric', MorphometricController::class);

    // Milk Production
    Route::resource('/milk-production', MilkProductionController::class);

    // Semen Analysis
    Route::resource('/semen-analysis', SemenAnalysisController::class);

    // Distribution
    Route::resource('/distribution', DistributionController::class);


    // Disease Treatment
    Route::resource('/disease-and-treatment', DiseaseTreatmentController::class);

    // Report
    Route::get('/research/selectDate', [ResearchStockController::class, 'selectDate'])->name('researchStock.selectDate');
    Route::get('/research-stock', [ResearchStockController::class, 'researchStock'])->name('researchStock.report');

    Route::get('/community-stock/selectDate', [CommunityStockController::class, 'selectDate'])->name('communityStock.selectDate');
    Route::get('/community-stock/report', [CommunityStockController::class, 'researchStock'])->name('communityStock.report');


    Route::resource('/animal-cat', AnimalCatController::class);
    Route::get('/get-animal-cat', [AnimalCatController::class, 'getAnimalCat'])->name('getAnimalCat');
    Route::post('animal-sub-cat/store', [AnimalCatController::class, 'SubCatStore'])->name('animalCat.SubCatStore');
    Route::get('animal-sub-sub-cat/{id}', [AnimalCatController::class, 'subEdit'])->name('animalCat.subEdit');
    Route::post('animal-sub-sub-cat/{id}', [AnimalCatController::class, 'subUpdate'])->name('animalCat.subUpdate');

    Route::resource('/body-weight', BodyWeightController::class);

    
    Route::resource('/reproduction-record', ReproductionController::class);


    Route::resource('/service-record', ServiceRecordController::class);

    Route::resource('/disease-and-health', DiseaseHealthController::class);

});


Route::get('/', 'App\Http\Controllers\Frontend\IndexController@index')->name('index');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
