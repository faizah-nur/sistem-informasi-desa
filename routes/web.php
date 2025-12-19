<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PengajuanSuratController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PengajuanSuratAdminController;

/*
|--------------------------------------------------------------------------
| ROOT
|--------------------------------------------------------------------------
*/
Route::redirect('/', '/login');

/*
|--------------------------------------------------------------------------
| AUTH DASHBOARD (USER)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| USER AREA
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // layanan
    Route::get('/layanan', [LayananController::class, 'index'])
        ->name('layanan.index');

    // pengajuan surat
    Route::get('/pengajuan/{slug}', [PengajuanSuratController::class, 'create'])
        ->name('pengajuan.create');

    Route::post('/pengajuan', [PengajuanSuratController::class, 'store'])
        ->name('pengajuan.store');

    Route::get('/pengajuan', [PengajuanSuratController::class, 'riwayat'])
        ->name('pengajuan.riwayat');

    Route::get('/pengajuan/{id}/detail', [PengajuanSuratController::class, 'show'])
        ->name('pengajuan.show');

    Route::patch('/pengajuan/{id}/batalkan', [PengajuanSuratController::class, 'batalkan'])
        ->name('pengajuan.batalkan');
});

/*
|--------------------------------------------------------------------------
| ADMIN AREA (WAJIB auth + admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

    // layanan desa (pengajuan surat)
    Route::prefix('layanan-desa')->name('layanan-desa.')->group(function () {

        Route::get('/pengajuan',
            [PengajuanSuratAdminController::class, 'index']
        )->name('pengajuan.index');

        Route::get('/pengajuan/{pengajuan}',
            [PengajuanSuratAdminController::class, 'show']
        )->name('pengajuan.show');

        Route::patch('/pengajuan/{pengajuan}',
            [PengajuanSuratAdminController::class, 'update']
        )->name('pengajuan.update');
    });

    // MASTER DATA ADMIN
    Route::resource('pengumuman', App\Http\Controllers\Admin\PengumumanController::class);
    Route::resource('progress-pembangunan', App\Http\Controllers\Admin\ProgressPembangunanController::class);
    Route::resource('galeri', App\Http\Controllers\Admin\GaleriController::class);
    Route::resource('kabar', App\Http\Controllers\Admin\KabarController::class);
    Route::resource('info', App\Http\Controllers\Admin\InfoController::class);
    Route::get('/tentang-desa', [App\Http\Controllers\Admin\TentangDesaController::class, 'index'])
        ->name('tentang-desa.index');
    Route::get('/tentang-desa/edit', [App\Http\Controllers\Admin\TentangDesaController::class, 'edit'])
        ->name('tentang-desa.edit');
    Route::put('/tentang-desa', [App\Http\Controllers\Admin\TentangDesaController::class, 'update'])
        ->name('tentang-desa.update');
});

/*
|--------------------------------------------------------------------------
| ADMIN LOGIN ALIAS (PAKAI LOGIN DEFAULT)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {

    // arahkan ke login laravel biasa
    Route::get('/login', function () {
        return redirect()->route('login', ['role' => 'admin']);
    })->name('admin_login');

    Route::post('/login-submit',
        [AdminController::class, 'login_submit']
    )->name('admin_login.submit');

    Route::post('/logout',
        [AdminController::class, 'logout']
    )->name('admin_logout');
});

/*
|--------------------------------------------------------------------------
| AUTH ROUTES (LARAVEL DEFAULT)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';