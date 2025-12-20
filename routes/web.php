<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PengajuanSuratController;
use App\Http\Controllers\Admin\PengajuanSuratAdminController;

/*
|--------------------------------------------------------------------------
| ROOT
|--------------------------------------------------------------------------
*/
Route::redirect('/', '/login');

/*
|--------------------------------------------------------------------------
| USER DASHBOARD
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

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Layanan
    Route::get('/layanan', [LayananController::class, 'index'])
        ->name('layanan.index');

    // Pengajuan Surat (USER)
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
| ADMIN AREA
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // Layanan Desa - Pengajuan Surat (ADMIN)
        Route::get('/layanan-surat',
            [PengajuanSuratAdminController::class, 'index']
        )->name('layanan.index');

        Route::get('/layanan-surat/{pengajuan}',
            [PengajuanSuratAdminController::class, 'show']
        )->name('layanan.show');

        Route::patch('/layanan-surat/{pengajuan}',
            [PengajuanSuratAdminController::class, 'update']
        )->name('layanan.update');
        Route::get('/layanan-surat/{pengajuan}/pdf',[PengajuanSuratAdminController::class, 'exportPdf']
        )->name('layanan.pdf');

        // Master Data
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
| AUTH ROUTES
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';