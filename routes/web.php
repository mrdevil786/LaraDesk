<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\BasicController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginView'])->name('view.login');
    Route::post('/login', [AuthController::class, 'login'])->name('submit.login');
});

Route::middleware(['auth:sanctum','web'])->group(function () {

    Route::get('/', [BasicController::class, 'dashboard'])->name('dashboard');
    Route::get('logout', [AuthController::class, 'logout'])->name('user.logout');

    Route::prefix('users')->middleware(['admin'])->group(function () {
        Route::get('/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
        Route::put('status', [UsersController::class, 'status'])->name('users.status');
    });

    Route::prefix('users')->middleware(['manager'])->group(function () {
        Route::post('store', [UsersController::class, 'store'])->name('users.store');
        Route::get('edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
        Route::post('update', [UsersController::class, 'update'])->name('users.update');
    });

    Route::prefix('users')->middleware(['member'])->group(function () {
        Route::get('/', [UsersController::class, 'index'])->name('users.index');
        Route::get('view/{id}', [UsersController::class, 'showUser'])->name('users.show');
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