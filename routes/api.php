<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AboutUsController;
use App\Http\Controllers\Api\DoctorsController;
use App\Http\Controllers\Api\OperationController;
use App\Http\Controllers\Api\OurServiceController;

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
Route::get('doctors', DoctorsController::class)->name('doctors');
Route::get('operations', OperationController::class)->name('operations');
