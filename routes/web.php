<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfilesController;

// Guest routes
Route::prefix('admin')->name('admin.')->middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginView'])->name('view.login');
    Route::post('/login', [AuthController::class, 'login'])->name('submit.login');
});

// Authenticated admin routes
Route::prefix('admin')->name('admin.')->middleware(['auth:sanctum', 'web', 'checkAdminStatus'])->group(function () {

    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('logout', [AuthController::class, 'logout'])->name('user.logout');

    // User management routes
    Route::prefix('users')->name('users.')->controller(UsersController::class)->group(function () {

        // Routes for admins
        Route::middleware('admin')->group(function () {
            Route::delete('/{id}', 'destroy')->name('destroy');
            Route::put('status', 'status')->name('status');
            Route::post('create', 'create')->name('create');
        });

        // Routes for managers
        Route::middleware('manager')->group(function () {
            Route::post('store', 'store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
        });

        // Routes for members
        Route::middleware('member')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('view/{id}', 'view')->name('view');
        });
    });

    // Profile routes
    Route::prefix('profile')->name('profile.')->controller(ProfilesController::class)->group(function () {

        // Routes for members
        Route::middleware('member')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('view/{id}', 'view')->name('view');
            Route::post('update', 'updateProfile')->name('update');
            Route::post('update-password', 'updatePassword')->name('update.password');
        });
    });
});


// Route::name('users.')
//     ->prefix('users')
//     ->controller(UsersController::class)->group(function () {
//         Route::get('/', 'index')->name('index');
//         Route::get('blocked', 'index')->name('blocked');
//         Route::get('deleted', 'index')->name('deleted');
//         Route::post('store', 'store')->name('store');
//         Route::get('edit/{id}', "edit")->name('edit');
//         Route::delete('/{id}', 'destroy')->name('destroy');
//         Route::post('update', 'update')->name('update');
//         Route::put('status', 'status')->name('status');
//         Route::get('view/{id}', 'showUser')->name('show');
//     });