<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\DashboardController;

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
    Route::post('/admin-user/user-file-store', [AdminUserController::class, 'userFileStore'])->name('admin.userFileStore');
    Route::get('/admin-user/file/destroy/{id}', [AdminUserController::class, 'userFileDestroy'])->name('admin.userFileDestroy');






});


Route::get('/', 'App\Http\Controllers\Frontend\IndexController@index')->name('index');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
