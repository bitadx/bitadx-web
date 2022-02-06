<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;

Route::group(['as' => 'admin.','prefix' => 'admin','middleware' => ['auth','admin']], function () {
    // Route::group(['middleware' => 'role:'.config('boilerplate.access.role.admin')], function () {

    // });


    Route::get('/',[DashboardController::class,'index']);
    Route::post('update-wallet',[UserController::class,'storeWalletAmount']);
    Route::resource('/users',UserController::class);


    Route::resource('categories',CategoryController::class);

    Route::resource('products',CourseController::class)->except(['show']);

    Route::get('courses/{id}/delete-image',[CourseController::class,'deleteImage']);

    Route::get('/enquiries',[CourseController::class,'enquiry']);

    Route::resource('reviews',ReviewController::class);

    Route::post('/delete-courses',[CourseController::class,'deleteBulk']);

    Route::post('/delete-categories',[CategoryController::class,'deleteBulk']);

    Route::post('/delete-enquiries',[CourseController::class,'deleteBulkEnquiries']);

    Route::post('/delete-reviews',[ReviewController::class,'deleteBulk']);

});
