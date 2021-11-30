<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\FarmerController;
use App\Http\Controllers\Admin\GlobalController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\DippingController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ParasiteController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AnimalCatController;
use App\Http\Controllers\Admin\CommunityController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DewormingController;
use App\Http\Controllers\Admin\AnimalInfoController;
use App\Http\Controllers\Admin\BodyWeightController;
use App\Http\Controllers\Admin\DeadCulledController;
use App\Http\Controllers\Admin\DeathEntryController;
use App\Http\Controllers\Admin\PostMortemController;
use App\Http\Controllers\Admin\VaccinationController;
use App\Http\Controllers\Admin\CommunityCatController;
use App\Http\Controllers\Admin\DistributionController;
use App\Http\Controllers\Admin\MorphometricController;
use App\Http\Controllers\Admin\Report\BirthController;
use App\Http\Controllers\Admin\Report\DeathController;
use App\Http\Controllers\Admin\ReproductionController;
use App\Http\Controllers\Admin\ResearchFarmController;
use App\Http\Controllers\Admin\DiseaseHealthController;
use App\Http\Controllers\Admin\ResearchStockController;
use App\Http\Controllers\Admin\SemenAnalysisController;
use App\Http\Controllers\Admin\CommunityStockController;
use App\Http\Controllers\Admin\MilkProductionController;
use App\Http\Controllers\Admin\CastrationRecordController;
use App\Http\Controllers\Admin\Category\DiseaseController;
use App\Http\Controllers\Admin\DiseaseTreatmentController;
use App\Http\Controllers\Admin\Report\BlriBirthController;
use App\Http\Controllers\Admin\Report\BlriDeathController;
use App\Http\Controllers\Admin\Report\KidMortalityController;
use App\Http\Controllers\Admin\Category\ClinicalSignController;
use App\Http\Controllers\Admin\Report\BlriKidMortalityController;
use App\Http\Controllers\Admin\Report\DiseaseIncidenceController;
use App\Http\Controllers\Admin\Report\BlriDiseaseIncidenceController;

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

Route::get('/login', [AuthController::class, 'login'])->name('login');
// Route::get('/register', [AuthController::class, 'register'])->name('register');
// Route::post('/register-store', [AuthController::class, 'registerStore'])->name('registerStore');
Route::get('/register-verify/{token}', [AuthController::class, 'registerVerify'])->name('registerVerify');
Route::get('/verify-notification', [AuthController::class, 'verifyNotification'])->name('verifyNotification');

Route::post('/verify-resend', [AuthController::class, 'verifyResend'])->name('verifyResend');

Route::get('/forget-password', [AuthController::class, 'forgetPassword'])->name('forgetPassword');
Route::post('/forget-password-process', [AuthController::class, 'forgetPasswordProcess'])->name('forgetPasswordProcess');
Route::get('/reset-password/{token}', [AuthController::class, 'resetPassword'])->name('resetPassword');
Route::post('/reset-password-process', [AuthController::class, 'resetPasswordProcess'])->name('resetPasswordProcess');
Route::get('/reset-verify-notification', [AuthController::class, 'resetVerifyNotification'])->name('resetVerifyNotification');

Route::post('/login-process', [AuthController::class, 'loginProcess'])->name('loginProcess');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth','admin'])->prefix('admin')->group(function(){
    Route::post('logged_in', [LoginController::class, 'authenticate']);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/visitor_info', [DashboardController::class, 'VisitorInfo'])->name('VisitorInfo');

    // Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    // Route::get('/laraDashboard', [AuthController::class, 'laraDashboard'])->name('laraDashboard');

    Route::get('/get-upazila', [GlobalController::class, 'upazila'])->name('get.upazila');
    Route::get('/get-animal-info', [GlobalController::class, 'getAnimalInfo'])->name('get.getAnimalInfo');

    Route::prefix('category')->group(function(){
        Route::resource('/clinical-sign', ClinicalSignController::class);
    });

    Route::resource('/slider', SliderController::class);
    Route::resource('/about', AboutController::class);

    // User Start________________________________________________________________________________________________________________
    Route::resource('/admin-user', AdminUserController::class)->middleware(['role:admin']);
    // Route::post('/admin-user/destroy/{id}', [AdminUserController::class, 'destroy'])->name('admin.destroy');
    Route::post('/admin-user/user-file-store', [AdminUserController::class, 'userFileStore'])->name('admin.userFileStore')->middleware(['role:admin']);
    Route::post('/admin-user/file/destroy/{id}', [AdminUserController::class, 'userFileDestroy'])->name('admin.userFileDestroy')->middleware(['role:admin']);

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
    Route::get('/get-service', [AnimalInfoController::class, 'getService'])->name('getService');

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

    // Vaccination
    Route::resource('/vaccination', VaccinationController::class);

    // Deworming
    Route::resource('/deworming', DewormingController::class);

    // Dipping
    Route::resource('/dipping', DippingController::class);

    // Parasite
    Route::resource('/parasite', ParasiteController::class);


    // Dead Culled
    Route::resource('/dead-culled', DeadCulledController::class);

    // Castration Record
    Route::resource('/castration-record', CastrationRecordController::class);


    Route::resource('/disease', DiseaseController::class);

    // Death
    Route::resource('/death-entry', DeathEntryController::class);

    // Post Mortem
    Route::resource('/post-mortem', PostMortemController::class);

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
    Route::get('/get-body-weight', [BodyWeightController::class, 'getBodyWeight'])->name('get.bodyWeight');


    Route::resource('/reproduction-record', ReproductionController::class);

    Route::resource('/service', ServiceController::class);



    Route::resource('/disease-and-health', DiseaseHealthController::class);

    Route::prefix('report')->group(function(){
        Route::prefix('blri')->group(function(){
            Route::prefix('disease-incidence')->group(function(){
                Route::get('/select', [BlriDiseaseIncidenceController::class, 'selectDate'])->name('report.blri.disease.selectDate');
                Route::post('/report', [BlriDiseaseIncidenceController::class, 'report'])->name('report.blri.disease.report');
            });
            Route::prefix('birth')->group(function(){
                Route::get('/select', [BlriBirthController::class, 'selectDate'])->name('report.blri.bitrh.selectDate');
                Route::post('/report', [BlriBirthController::class, 'report'])->name('report.blri.bitrh.report');
            });

            Route::prefix('death')->group(function(){
                Route::get('/select', [BlriDeathController::class, 'selectDate'])->name('report.blri.death.selectDate');
                Route::post('/report', [BlriDeathController::class, 'report'])->name('report.blri.death.report');
            });

            Route::prefix('kid-mortality')->group(function(){
                Route::get('/select', [BlriKidMortalityController::class, 'selectDate'])->name('report.blri.kidMortality.selectDate');
                Route::post('/report', [BlriKidMortalityController::class, 'report'])->name('report.blri.kidMortality.report');
            });
        });

        Route::prefix('community')->group(function(){
            Route::prefix('disease-incidence')->group(function(){
                Route::get('/select', [DiseaseIncidenceController::class, 'selectDate'])->name('report.disease.selectDate');
                Route::post('/report', [DiseaseIncidenceController::class, 'report'])->name('report.disease.report');
            });
            Route::prefix('birth')->group(function(){
                Route::get('/select', [BirthController::class, 'selectDate'])->name('report.bitrh.selectDate');
                Route::post('/report', [BirthController::class, 'report'])->name('report.bitrh.report');
            });

            Route::prefix('death')->group(function(){
                Route::get('/select', [DeathController::class, 'selectDate'])->name('report.death.selectDate');
                Route::post('/report', [DeathController::class, 'report'])->name('report.death.report');
            });

            Route::prefix('kid-mortality')->group(function(){
                Route::get('/select', [KidMortalityController::class, 'selectDate'])->name('report.kidMortality.selectDate');
                Route::post('/report', [KidMortalityController::class, 'report'])->name('report.kidMortality.report');
            });
        });
    });

    Route::get('/animal-sub-cat', [GlobalController::class, 'animalSubCat'])->name('animalSubCat');

});


Route::get('/', 'App\Http\Controllers\Frontend\IndexController@index')->name('index');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
