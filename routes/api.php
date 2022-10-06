<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\News\NewsController;
use App\Http\Controllers\Api\Blogs\BlogsController;
use App\Http\Controllers\Api\AboutUs\AboutUsController;
use App\Http\Controllers\Api\Doctors\DoctorsController;
use App\Http\Controllers\Api\Doctors\AwardDoctorController;
use App\Http\Controllers\Api\Doctors\SingleDoctorController;
use App\Http\Controllers\Api\Operations\OperationController;
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

Route::get('about-us', AboutUsController::class)->name('about-us');
Route::get('our-service', OurServiceController::class)->name('our-service');

Route::prefix('doctors')->name('doctors.')->group(function() {
    Route::get('/', DoctorsController::class)->name('doctors');
    Route::get('single/{id}', SingleDoctorController::class)->name('single');
    Route::get('awards', AwardDoctorController::class)->name('awards');
});

Route::get('operations', OperationController::class)->name('operations');
Route::get('blogs', BlogsController::class)->name('blogs');
Route::get('news', NewsController::class)->name('news');
