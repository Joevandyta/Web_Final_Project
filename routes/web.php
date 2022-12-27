<?php

use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;
use App\Http\Controllers\poinMahasiswaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
Route::group(['middleware' => 'auth'], function() {
    Route::resource('poinMahasiswa', poinMahasiswaController::class);

    Route::get("/redirectAuthenticatedUsers", [RedirectAuthenticatedUsersController::class, "home"]);

    Route::group(['middleware' => 'checkRole:student'], function() {
        
        Route::get('/', function () {
            return view('frontPage.dashboard');
        })->name('dashboard');
        Route::get('/poinPorto', function () {
            return view('frontPage.listPoint');
        });

    });
    Route::group(['middleware' => 'checkRole:pa'], function() {
        Route::get('/PADashboard', function () {
            return view('BackPage.LectureDashboard');
        });
        Route::get('/PAlistPage', function () {
            return view('BackPage.lecturerPage');
        });
    });

    
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
 
});
require __DIR__.'/auth.php';