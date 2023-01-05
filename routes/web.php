<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WebsiteController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(DashboardController::class)->middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
});

Route::controller(WebsiteController::class)->prefix('websites')->middleware(['auth'])->group(function () {
    Route::get('/', 'index')->name('websites');
    Route::get('/test', 'test')->name('websites.test');
    Route::get('/show/{website}', 'show')->name('websites.show');
    Route::post('/store', 'store')->name('websites.store');
    Route::delete('/delete/{website}', 'delete')->name('websites.delete');
});


require __DIR__ . '/auth.php';
