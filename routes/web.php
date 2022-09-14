<?php

use App\Http\Controllers\AboutusContentController;
use App\Http\Controllers\Admin\AboutUsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::get('/', [AdminController::class, 'welcome'])->name('welcome');

Route::prefix('/admin')->name('admin.')->middleware('auth')->group(function (){

    Route::get('/dashboard', [AdminController::class, 'dashboard'] )->name('dashboard');
    Route::resource('about-us', AboutUsController::class);
    Route::resource('aboutus-contents', AboutusContentController::class);
});

require __DIR__.'/auth.php';
