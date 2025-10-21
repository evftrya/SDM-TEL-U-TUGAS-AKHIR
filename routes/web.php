<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PengawakanController;
use App\Http\Controllers\ProdiController;
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

            Route::get('/list/{destination}', [PegawaiController::class, 'index'])->name('list');
            Route::get('/new', [PegawaiController::class, 'new'])->name('new');
            
            Route::get('/dashboard', function () {
                return view('kelola_data.manajemen_akun.dashboard');
            })->name('dashboard');
        });

        Route::group(['prefix' => 'fakultas', 'as' => 'fakultas.'], function () {
            Route::get('/view', function () {
                return view('kelola_data.fakultas.view');
            })->name('view');

            Route::get('/list', [FacultyController::class, 'index'])->name('list');

            Route::get('/new', function () {
                return view('kelola_data.manajemen_akun.input');
            })->name('new');
            Route::get('/dashboard', function () {
                return view('kelola_data.manajemen_akun.dashboard');
            })->name('dashboard');
        });

        Route::group(['prefix' => 'level', 'as' => 'level.'], function () {
            Route::get('/view', function () {
                return view('kelola_data.fakultas.view');
            })->name('view');
    
            Route::get('/list/', [LevelController::class, 'index'])->name('list');
            Route::get('/new', [LevelController::class, 'new'])->name('new');
            Route::post('/create', [LevelController::class, 'create'])->name('create');
            Route::post('/update-data', [LevelController::class, 'create'])->name('update-data');
            Route::get('/update/{idLevel}', [LevelController::class, 'update'])->name('update');
            
            
            // Route::get('/new', function () {
            //     return view('kelola_data.level.input');
            // })->name('new');
            Route::get('/dashboard', function () {
                return view('kelola_data.manajemen_akun.dashboard');
            })->name('dashboard');
        });

        Route::group(['prefix' => 'formasi', 'as' => 'formasi.'], function () {
            Route::get('/view', function () {
                return view('kelola_data.formasi.view');
            })->name('view');
    
            Route::get('/list/', [FormationController::class, 'index'])->name('list');
            
            Route::get('/new', function () {
                return view('kelola_data.formasi.view');
            })->name('new');
            Route::get('/dashboard', function () {
                return view('kelola_data.manajemen_akun.dashboard');
            })->name('dashboard');
        });

        Route::group(['prefix' => 'pengawakan', 'as' => 'pengawakan.'], function () {
            Route::get('/view', function () {
                return view('kelola_data.formasi.view');
            })->name('view');
    
            Route::get('/list/', [PengawakanController::class, 'index'])->name('list');
            
            Route::get('/new', function () {
                return view('kelola_data.formasi.view');
            })->name('new');
            Route::get('/dashboard', function () {
                return view('kelola_data.manajemen_akun.dashboard');
            })->name('dashboard');
        });

        // Prodi Routes
        Route::resource('prodi', ProdiController::class);
    });

    // Kinerja Pegawai Routes (separated from manage)
    Route::group(['prefix' => 'kinerja', 'as' => 'kinerja.'], function () {
        // Main index
        Route::get('/', function () {
            return view('kinerja_pegawai.index');
        })->name('index');

        // Base and sidebar may be included in other views but provide direct routes for preview
        Route::get('/base', function () {
            return view('kinerja_pegawai.base');
        })->name('base');

        Route::get('/sidebar', function () {
            return view('kinerja_pegawai.sidebar');
        })->name('sidebar');

        // Dashboard Fakultas
        Route::get('/dashboard/fakultas', function () {
            return view('kinerja_pegawai.dashboard_fakultas.index');
        })->name('dashboard.fakultas.index');

        Route::get('/dashboard/fakultas/{id?}', function ($id = null) {
            return view('kinerja_pegawai.dashboard_fakultas.detail', ['id' => $id]);
        })->name('dashboard.fakultas.detail');

        Route::get('/dashboard/fakultas/input/{id?}', function ($id = null) {
            return view('kinerja_pegawai.dashboard_fakultas.input', ['id' => $id]);
        })->name('dashboard.fakultas.input');


        // Dashboard Target
        Route::get('/dashboard/target', function () {
            return view('kinerja_pegawai.dashboard_target.input');
        })->name('dashboard.target.input');

        Route::get('/dashboard/target/{action}/{id?}', function ($action, $id = null) {
            $action = in_array($action, ['approval', 'detail', 'edit', 'input']) ? $action : 'detail';
            return view("kinerja_pegawai.dashboard_target.$action", ['id' => $id]);
        })->where('action', 'approval|detail|edit|input')->name('dashboard.target.action');

        // Laporan Target
        Route::get('/laporan/target/{id?}', function ($id = null) {
            return view('kinerja_pegawai.laporan_target.detail', ['id' => $id]);
        })->name('laporan.target.detail');
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
