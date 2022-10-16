<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\About\AboutUsController;
use App\Http\Controllers\Admin\About\AboutusFaqController;
use App\Http\Controllers\Admin\About\AboutusContentController;
use App\Http\Controllers\Admin\Blog\BlogController;
use App\Http\Controllers\Admin\Blog\BlogInfoController;
use App\Http\Controllers\Admin\Contuct\ContuctUsController;
use App\Http\Controllers\Admin\Doctor\DoctorController;
use App\Http\Controllers\Admin\Doctor\DoctorFaqController;
use App\Http\Controllers\Admin\Doctor\DoctorInfoController;
use App\Http\Controllers\Admin\Doctor\AwardDoctorController;
use App\Http\Controllers\Admin\News\NewsController;
use App\Http\Controllers\Admin\News\NewsInfosController;
use App\Http\Controllers\Admin\Operation\OperationController;
use App\Http\Controllers\Admin\OurService\OurServiceController;
use App\Http\Controllers\Admin\OurService\OurServiceFaqController;
use App\Http\Controllers\Admin\OurService\OurServiceDepartmentController;
use App\Http\Controllers\Admin\Sponsor\SponsorController;

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

Route::get('/', [AdminController::class, 'welcome'])->middleware('auth')->name('welcome');

Route::prefix('/admin')->name('admin.')->middleware('auth')->group(function (){
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'] )->name('dashboard');

    // About Us
    Route::prefix('about-us')->name('about-us.')->group(function() {
        Route::resources([
            'home-image' => AboutUsController::class,
            'contents' => AboutusContentController::class,
            'faqs' => AboutusFaqController::class,
        ]);
    });

    // Our Service
    Route::prefix('our-service')->name('our-service.')->group(function() {
        Route::resources([
            'home-image' => OurServiceController::class,
            'departments' => OurServiceDepartmentController::class,
            'faqs' => OurServiceFaqController::class,
        ]);
    });

    // Doctors
    Route::prefix('doctors')->name('doctors.')->group(function() {
        Route::resources([
            'award' => AwardDoctorController::class,
            'home-image' => DoctorController::class,
            'doctor-infos' => DoctorInfoController::class,
            'faqs' => DoctorFaqController::class,
        ]);
    });

    // Operations
    Route::resource('operations', OperationController::class);

    // Blogs
    Route::prefix('blogs')->name('blogs.')->group(function() {
        Route::resource('home-image', BlogController::class);
        Route::resource('blog-infos', BlogInfoController::class);
    });

    // News
    Route::prefix('news')->name('news.')->group(function() {
        Route::resource('home-image', NewsController::class);
        Route::resource('news-infos', NewsInfosController::class);
    });

    // Sponsors
    Route::resource('sponsors', SponsorController::class);

    // Contuct-us
    Route::prefix('contuct-us')->name('contuct-us.')->group(function() {
        Route::delete('forceDelete/{id}', [ContuctUsController::class, 'forceDelete'])->name('forcedelete');
        Route::get('restoreAll', [ContuctUsController::class, 'restoreAll'])->name('restore.all');
        Route::get('restore/{id}', [ContuctUsController::class, 'restore'])->name('restore');
        Route::get('archived', [ContuctUsController::class, 'archived'])->name('archived');
        Route::resource('table', ContuctUsController::class)->only([
            'index', 'show', 'destroy'
        ]);
    });
});

require __DIR__.'/auth.php';
