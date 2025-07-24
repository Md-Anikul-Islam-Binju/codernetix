<?php
use App\Http\Controllers\AboutPageController;
use App\Http\Controllers\admin\ClientController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ExpenseCategoryController;
use App\Http\Controllers\admin\ExpenseController;
use App\Http\Controllers\admin\ProductCategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProjectCategoryController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\ProjectHistoryController;
use App\Http\Controllers\admin\ProjectPaymentHistoryController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\SiteSettingController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\TeamController;
use App\Http\Controllers\admin\TechnologyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactPageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectSectionController;
use App\Http\Controllers\ReadyProductController;
use App\Http\Controllers\ServicePageController;
use App\Http\Controllers\TeamSectionController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutPageController::class, 'about'])->name('about');
Route::get('/contact', [ContactPageController::class, 'contact'])->name('contact');
Route::get('/service', [ServicePageController::class, 'service'])->name('service');
Route::get('/project', [ProjectSectionController::class, 'project'])->name('project');
Route::get('/team', [TeamSectionController::class, 'team'])->name('team');
Route::get('/product/{id}', [ReadyProductController::class, 'readyProduct'])->name('product');


Route::middleware('auth')->group(callback: function () {
    //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //Slider Section
    Route::get('/slider-section', [SliderController::class, 'index'])->name('slider.section');
    Route::post('/slider-store', [SliderController::class, 'store'])->name('slider.store');
    Route::put('/slider-update/{id}', [SliderController::class, 'update'])->name('slider.update');
    Route::get('/slider-delete/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');

    //Project Section
    Route::get('/project-section', [ProjectController::class, 'index'])->name('project.section');
    Route::post('/project-store', [ProjectController::class, 'store'])->name('project.store');
    Route::put('/project-update/{id}', [ProjectController::class, 'update'])->name('project.update');
    Route::get('/project-delete/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');


    //Product Section
    Route::get('/product-section', [ProductController::class, 'index'])->name('product.section');
    Route::post('/product-store', [ProductController::class, 'store'])->name('product.store');
    Route::put('/product-update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/product-delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');


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

    //Our Simple Inventory
    //project category Section
    Route::get('/project-category-section', [ProjectCategoryController::class, 'index'])->name('project.category.section');
    Route::post('/project-category-store', [ProjectCategoryController::class, 'store'])->name('project.category.store');
    Route::put('/project-category-update/{id}', [ProjectCategoryController::class, 'update'])->name('project.category.update');
    Route::get('/project-category-delete/{id}', [ProjectCategoryController::class, 'destroy'])->name('project.category.destroy');

    //product category Section
    Route::get('/product-category-section', [ProductCategoryController::class, 'index'])->name('product.category.section');
    Route::post('/product-category-store', [ProductCategoryController::class, 'store'])->name('product.category.store');
    Route::put('/product-category-update/{id}', [ProductCategoryController::class, 'update'])->name('product.category.update');
    Route::get('/product-category-delete/{id}', [ProductCategoryController::class, 'destroy'])->name('product.category.destroy');



    //client project history Section
    Route::get('/project-history-section', [ProjectHistoryController::class, 'index'])->name('project.history.section');
    Route::post('/project-history-store', [ProjectHistoryController::class, 'store'])->name('project.history.store');
    Route::put('/project-history-update/{id}', [ProjectHistoryController::class, 'update'])->name('project.history.update');
    Route::get('/project-history-delete/{id}', [ProjectHistoryController::class, 'destroy'])->name('project.history.destroy');

    //client project payment history Section
    Route::get('/project-history-payment-section/{id}', [ProjectPaymentHistoryController::class, 'show'])->name('project.payment.history.section');
    Route::post('/project-history-payment-store', [ProjectPaymentHistoryController::class, 'store'])->name('project.payment.history.store');
    Route::put('/project-history-payment-update/{id}', [ProjectPaymentHistoryController::class, 'update'])->name('project.payment.history.update');
    Route::get('/project-history-payment-delete/{id}', [ProjectPaymentHistoryController::class, 'destroy'])->name('project.payment.history.destroy');

    //Expense Category Section
    Route::get('/expense-category-section', [ExpenseCategoryController::class, 'index'])->name('expense.category.section');
    Route::post('/expense-category-store', [ExpenseCategoryController::class, 'store'])->name('expense.category.store');
    Route::put('/expense-category-update/{id}', [ExpenseCategoryController::class, 'update'])->name('expense.category.update');
    Route::get('/expense-category-delete/{id}', [ExpenseCategoryController::class, 'destroy'])->name('expense.category.destroy');


    //Expense Section
    Route::get('/expense-section', [ExpenseController::class, 'index'])->name('expense.section');
    Route::post('/expense-store', [ExpenseController::class, 'store'])->name('expense.store');
    Route::put('/expense-update/{id}', [ExpenseController::class, 'update'])->name('expense.update');
    Route::get('/expense-delete/{id}', [ExpenseController::class, 'destroy'])->name('expense.destroy');

});
require __DIR__.'/auth.php';
