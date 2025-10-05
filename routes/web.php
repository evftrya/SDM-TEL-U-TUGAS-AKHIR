<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['prefix' => 'manage', 'as' => 'manage.'], function () {
        Route::get('/', function () {
                return view('kelola_data.index');
            })->name('view');

        Route::group(['prefix' => 'account', 'as' => 'account.'], function () {
            Route::get('/view', function () {
                return view('kelola_data.manajemen_akun.view');
            })->name('view');

            Route::get('/list', function () {
                return view('kelola_data.manajemen_akun.list');
            })->name('list');
            
            Route::get('/new', function () {
                return view('kelola_data.manajemen_akun.new');
            })->name('new');
            Route::get('/dashboard', function () {
                return view('kelola_data.manajemen_akun.dashboard');
            })->name('dashboard');
        });

        Route::group(['prefix' => 'pegawai', 'as' => 'pegawai.'], function () {
            Route::get('/view', function () {
                return view('kelola_data.pegawai.view');
            })->name('view');

            Route::get('/', function () {
                return view('kelola_data.pegawai.list');
            })->name('list');
            
            Route::get('/new', function () {
                return view('kelola_data.manajemen_akun.new');
            })->name('new');
            Route::get('/dashboard', function () {
                return view('kelola_data.manajemen_akun.dashboard');
            })->name('dashboard');
        });
    });
    

});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // User Management
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/users/{user}', [AdminController::class, 'showUser'])->name('users.show');
    Route::get('/users/{user}/edit', [AdminController::class, 'editUser'])->name('users.edit');
    Route::put('/users/{user}', [AdminController::class, 'updateUser'])->name('users.update');
    Route::delete('/users/{user}', [AdminController::class, 'deleteUser'])->name('users.delete');
});

require __DIR__.'/auth.php';
