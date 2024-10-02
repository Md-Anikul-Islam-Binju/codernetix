<?php

use App\Http\Controllers\AboutPageController;
use App\Http\Controllers\admin\ClientController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\SiteSettingController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\TeamController;
use App\Http\Controllers\admin\TechnologyController;
use App\Http\Controllers\ContactPageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServicePageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutPageController::class, 'about'])->name('about');
Route::get('/contact', [ContactPageController::class, 'contact'])->name('contact');
Route::get('/service', [ServicePageController::class, 'service'])->name('service');

//Admin
Route::middleware('auth')->group(callback: function () {
    //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //Slider Section
    Route::get('/slider-section', [SliderController::class, 'index'])->name('slider.section');
    Route::post('/slider-store', [SliderController::class, 'store'])->name('slider.store');
    Route::put('/slider-update/{id}', [SliderController::class, 'update'])->name('slider.update');
    Route::get('/slider-delete/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');

    //Technology Section
    Route::get('/technology-section', [TechnologyController::class, 'index'])->name('technology.section');
    Route::post('/technology-store', [TechnologyController::class, 'store'])->name('technology.store');
    Route::put('/technology-update/{id}', [TechnologyController::class, 'update'])->name('technology.update');
    Route::get('/technology-delete/{id}', [TechnologyController::class, 'destroy'])->name('technology.destroy');

    //Client Section
    Route::get('/client-section', [ClientController::class, 'index'])->name('client.section');
    Route::post('/client-store', [ClientController::class, 'store'])->name('client.store');
    Route::put('/client-update/{id}', [ClientController::class, 'update'])->name('client.update');
    Route::get('/client-delete/{id}', [ClientController::class, 'destroy'])->name('client.destroy');

    //Service Section
    Route::get('/service-section', [ServiceController::class, 'index'])->name('service.section');
    Route::post('/service-store', [ServiceController::class, 'store'])->name('service.store');
    Route::put('/service-update/{id}', [ServiceController::class, 'update'])->name('service.update');
    Route::get('/service-delete/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');

    //Service Section
    Route::get('/team-section', [TeamController::class, 'index'])->name('team.section');
    Route::post('/team-store', [TeamController::class, 'store'])->name('team.store');
    Route::put('/team-update/{id}', [TeamController::class, 'update'])->name('team.update');
    Route::get('/team-delete/{id}', [TeamController::class, 'destroy'])->name('team.destroy');

    //Site Setting
    Route::get('/site-setting', [SiteSettingController::class, 'index'])->name('site.setting');
    Route::post('/site-settings-store-update/{id?}', [SiteSettingController::class, 'createOrUpdate'])->name('site-settings.createOrUpdate');
});
require __DIR__.'/auth.php';
