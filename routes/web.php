<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\About\AboutUsController;
use App\Http\Controllers\Admin\About\AboutusFaqController;
use App\Http\Controllers\Admin\About\AboutusContentController;
use App\Http\Controllers\Admin\Blog\BlogController;
use App\Http\Controllers\Admin\Blog\BlogInfoController;
use App\Http\Controllers\Admin\Doctor\DoctorController;
use App\Http\Controllers\Admin\Doctor\DoctorFaqController;
use App\Http\Controllers\Admin\Doctor\DoctorInfoController;
use App\Http\Controllers\Admin\Doctor\AwardDoctorController;
use App\Http\Controllers\Admin\Operation\OperationController;
use App\Http\Controllers\Admin\OurService\OurServiceController;
use App\Http\Controllers\Admin\OurService\OurServiceFaqController;
use App\Http\Controllers\Admin\OurService\OurServiceDepartmentController;

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
        Route::resource('home-image', AboutUsController::class);
        Route::resource('contents', AboutusContentController::class);
        Route::resource('faqs', AboutusFaqController::class);
    });

    // Our Service
    Route::prefix('our-service')->name('our-service.')->group(function() {
        Route::resource('home-image', OurServiceController::class);
        Route::resource('departments', OurServiceDepartmentController::class);
        Route::resource('faqs', OurServiceFaqController::class);
    });

    // Doctors
    Route::prefix('doctors')->name('doctors.')->group(function() {
        Route::resource('award', AwardDoctorController::class);
        Route::resource('home-image', DoctorController::class);
        Route::resource('doctor-infos', DoctorInfoController::class);
        Route::resource('faqs', DoctorFaqController::class);
    });

    // Operations
    Route::resource('operations', OperationController::class);

    // Blogs
    Route::prefix('blogs')->name('blogs.')->group(function() {
        Route::resource('home-image', BlogController::class);
        Route::resource('blog-infos', BlogInfoController::class);
    });
});

require __DIR__.'/auth.php';
