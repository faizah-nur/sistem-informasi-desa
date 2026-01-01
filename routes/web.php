<?php

use App\Models\ProgressPembangunan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\User\KabarController;
use App\Http\Controllers\User\KontakController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\PengajuanSuratController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\PengumumanController;
use App\Http\Controllers\Admin\KontakPesanController;
use App\Http\Controllers\Admin\TentangDesaController;
use App\Http\Controllers\Auth\WargaRegisterController;
use App\Http\Controllers\Admin\PengajuanSuratAdminController;
use App\Http\Controllers\Admin\ProgressPembangunanController;

/*
|--------------------------------------------------------------------------
| PUBLIC AREA (TANPA LOGIN)
|--------------------------------------------------------------------------
*/

// halaman utama / dashboard publik
Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::get('/register', [WargaRegisterController::class, 'show'])
    ->name('register');

Route::post('/register', [WargaRegisterController::class, 'store']);

// berita & informasi publik
Route::get('/kabar', [KabarController::class, 'index'])->name('kabar.index');
Route::get('/kabar/{slug}', [KabarController::class, 'show'])->name('kabar.show');

// kontak publik
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');
Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');

/*
|--------------------------------------------------------------------------
| USER AREA (WAJIB LOGIN WARGA)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // layanan desa
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

    // PDF (hanya jika selesai)
    // Route::get('/pengajuan/{id}/pdf',
    //     [PengajuanSuratController::class, 'downloadPdf']
    // )->name('pengajuan.pdf');
Route::get('/pengajuan/{id}/pdf',
    [PengajuanSuratController::class, 'downloadPdf']
)->name('pengajuan.pdf');

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

    // 📄 LIST PENGAJUAN
    Route::get('/layanan-surat',
        [PengajuanSuratAdminController::class, 'index']
    )->name('layanan.index');

    // 🔍 DETAIL
    Route::get('/layanan-surat/{pengajuan}',
        [PengajuanSuratAdminController::class, 'show']
    )->name('layanan.show');

    // ✏️ UPDATE STATUS (pending / diproses / ditolak)
    Route::patch('/layanan-surat/{pengajuan}',
        [PengajuanSuratAdminController::class, 'update']
    )->name('layanan.update');

    // 📄 EXPORT PDF (HANYA JIKA SELESAI)
    Route::get('/layanan-surat/{pengajuan}/pdf',
        [PengajuanSuratAdminController::class, 'exportPdf']
    )->name('layanan.pdf');

    // ✅ SELESAIKAN + GENERATE NOMOR
    Route::post('/layanan-surat/{pengajuan}/selesai',
        [PengajuanSuratAdminController::class, 'selesai']
    )->name('pengajuan.selesai');

        // kontak pesan
        Route::get('/tentang-desa', [App\Http\Controllers\Admin\TentangDesaController::class, 'index'])
            ->name('tentang-desa.index');
        Route::get('/tentang-desa/edit', [App\Http\Controllers\Admin\TentangDesaController::class, 'edit'])
            ->name('tentang-desa.edit'); 
        Route::put('/tentang-desa', [App\Http\Controllers\Admin\TentangDesaController::class, 'update'])
            ->name('tentang-desa.update');
        // Master Data
        Route::resource('pengumuman', App\Http\Controllers\Admin\PengumumanController::class);
        Route::resource('progress-pembangunan', App\Http\Controllers\Admin\ProgressPembangunanController::class);
        Route::resource('galeri', App\Http\Controllers\Admin\GaleriController::class);
        Route::resource('kabar', App\Http\Controllers\Admin\KabarController::class);
        Route::resource('info', App\Http\Controllers\Admin\InfoController::class);
        Route::get('/kontak', [KontakPesanController::class, 'index'])->name('kontak.index');
        Route::get('/kontak/{kontakPesan}', [KontakPesanController::class, 'show'])->name('kontak.show');
        Route::delete('/kontak/{kontakPesan}', [KontakPesanController::class, 'destroy'])->name('kontak.destroy');
});

/*
|--------------------------------------------------------------------------
| AUTH DEFAULT (LOGIN, LOGOUT)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';