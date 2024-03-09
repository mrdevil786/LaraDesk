<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\BasicController;

Route::prefix('admin')->middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginView'])->name('view.login');
    Route::post('/login', [AuthController::class, 'login'])->name('submit.login');
});

Route::prefix('admin')->name('admin.')->middleware(['auth:sanctum', 'web'])->group(function () {

    Route::get('/', [BasicController::class, 'dashboard'])->name('dashboard');
    Route::get('logout', [AuthController::class, 'logout'])->name('user.logout');

    Route::name('users.')
        ->prefix('users')
        ->middleware('admin')
        ->controller(UsersController::class)->group(function () {
            Route::get('/{id}', 'destroy')->name('destroy');
            Route::put('status', 'status')->name('status');
        });

    Route::name('users.')
        ->prefix('users')
        ->middleware('manager')
        ->controller(UsersController::class)->group(function () {
            Route::post('store', 'store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
        });

    Route::name('users.')
        ->prefix('users')
        ->middleware('member')
        ->controller(UsersController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('view/{id}', 'showUser')->name('show');
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