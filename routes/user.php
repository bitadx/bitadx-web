<?php

use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\CourseController;
use App\Http\Controllers\Frontend\IndexController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/cache-clear', function () {
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    return "Cache is cleared";
});
Route::group(['middleware' => ['auth','user']], function () {
    Route::get('/dashboard', [IndexController::class, 'index']);
    Route::get('/sell', [IndexController::class, 'sell']);
    Route::get('/history', [IndexController::class, 'history']);
    Route::post('/sell-currency', [IndexController::class, 'submitSell']);
    Route::post('/buy-currency', [IndexController::class, 'submitBuy']);
});
