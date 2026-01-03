<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\KabarController;
use App\Http\Controllers\User\KontakController;
use App\Http\Controllers\User\PengumumanController;
use App\Http\Controllers\PengajuanSuratController;
use App\Http\Controllers\Auth\WargaRegisterController;

// ADMIN
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\KabarController as AdminKabarController;
use App\Http\Controllers\Admin\KontakPesanController;
use App\Http\Controllers\Admin\TentangDesaController;
use App\Http\Controllers\Admin\PengajuanSuratAdminController;
use App\Http\Controllers\Admin\ProgressPembangunanController;
use App\Http\Controllers\Admin\PengumumanController as AdminPengumumanController;

/*
|--------------------------------------------------------------------------
| PUBLIC AREA (TANPA LOGIN)
|--------------------------------------------------------------------------
*/

// halaman utama
Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');

// register warga
Route::get('/register', [WargaRegisterController::class, 'show'])
    ->name('register');
Route::post('/register', [WargaRegisterController::class, 'store']);

// kabar / berita
Route::get('/kabar', [KabarController::class, 'index'])->name('kabar.index');
Route::get('/kabar/{slug}', [KabarController::class, 'show'])->name('kabar.show');

// komentar (wajib login)
Route::post('/kabar/{kabar}/komentar', [KomentarController::class, 'store'])
    ->middleware('auth')
    ->name('komentar.store');

// kontak
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');
Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');

/*
|--------------------------------------------------------------------------
| USER AREA (LOGIN + EMAIL VERIFIED)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {

    // profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // layanan
    Route::get('/layanan', [LayananController::class, 'index'])->name('layanan.index');

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

    Route::get('/pengajuan/{id}/pdf', [PengajuanSuratController::class, 'downloadPdf'])
        ->name('pengajuan.pdf');
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

        Route::get('/dashboard', fn () => view('admin.dashboard'))
            ->name('dashboard');

        // pengajuan surat
        Route::get('/layanan-surat', [PengajuanSuratAdminController::class, 'index'])
            ->name('layanan.index');

        Route::get('/layanan-surat/{pengajuan}', [PengajuanSuratAdminController::class, 'show'])
            ->name('layanan.show');

        Route::patch('/layanan-surat/{pengajuan}', [PengajuanSuratAdminController::class, 'update'])
            ->name('layanan.update');

        Route::get('/layanan-surat/{pengajuan}/pdf', [PengajuanSuratAdminController::class, 'exportPdf'])
            ->name('layanan.pdf');

        Route::post('/layanan-surat/{pengajuan}/selesai', [PengajuanSuratAdminController::class, 'selesai'])
            ->name('pengajuan.selesai');

        // tentang desa
        Route::get('/tentang-desa', [TentangDesaController::class, 'index'])->name('tentang-desa.index');
        Route::get('/tentang-desa/edit', [TentangDesaController::class, 'edit'])->name('tentang-desa.edit');
        Route::put('/tentang-desa', [TentangDesaController::class, 'update'])->name('tentang-desa.update');

        // master data
        Route::resource('pengumuman', AdminPengumumanController::class);
        Route::resource('progress-pembangunan', ProgressPembangunanController::class);
        Route::resource('galeri', GaleriController::class);
        Route::resource('kabar', AdminKabarController::class);

        // komentar (admin)
        Route::delete('/komentar/{komentar}', [KomentarController::class, 'destroy'])
            ->name('komentar.destroy');

        // kontak pesan
        Route::get('/kontak', [KontakPesanController::class, 'index'])->name('kontak.index');
        Route::get('/kontak/{kontakPesan}', [KontakPesanController::class, 'show'])->name('kontak.show');
        Route::delete('/kontak/{kontakPesan}', [KontakPesanController::class, 'destroy'])->name('kontak.destroy');
});

/*
|--------------------------------------------------------------------------
| AUTH DEFAULT (BREEZE)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';