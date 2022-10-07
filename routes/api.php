<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\News\NewsController;
use App\Http\Controllers\Api\News\SingleNewsController;
use App\Http\Controllers\Api\Blogs\BlogsController;
use App\Http\Controllers\Api\Blogs\SingleBlogController;
use App\Http\Controllers\Api\AboutUs\AboutUsController;
use App\Http\Controllers\Api\Doctors\DoctorsController;
use App\Http\Controllers\Api\Doctors\AwardDoctorController;
use App\Http\Controllers\Api\Doctors\SingleDoctorController;
use App\Http\Controllers\Api\Operations\OperationController;
use App\Http\Controllers\Api\Operations\SingleOperationController;
use App\Http\Controllers\Api\OurService\SingleOurServiceController;
use App\Http\Controllers\Api\OurServices\OurServiceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// About-us
Route::get('about-us', AboutUsController::class)->name('about-us');

// Our-Service
Route::prefix('our-service')->name('our-service.')->group(function() {
    Route::get('/', OurServiceController::class)->name('our-service');
    Route::get('single/{id}', SingleOurServiceController::class)->name('single');
});

// Doctors
Route::prefix('doctors')->name('doctors.')->group(function() {
    Route::get('/', DoctorsController::class)->name('doctors');
    Route::get('single/{id}', SingleDoctorController::class)->name('single');
    Route::get('awards', AwardDoctorController::class)->name('awards');
});

// Operations
Route::prefix('operations')->name('operations.')->group(function() {
    Route::get('/', OperationController::class)->name('operations');
    Route::get('single/{id}', SingleOperationController::class)->name('single');
});

// Blogs
Route::prefix('blogs')->name('blogs.')->group(function() {
    Route::get('/', BlogsController::class)->name('blogs');
    Route::get('single/{id}', SingleBlogController::class)->name('single');
});

// News
Route::prefix('news')->name('news.')->group(function() {
    Route::get('/', NewsController::class)->name('news');
    Route::get('single/{id}', SingleNewsController::class)->name('single');
});
