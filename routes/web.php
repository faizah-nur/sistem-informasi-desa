<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\KabarController;
use App\Http\Controllers\User\KontakController;
use App\Http\Controllers\PengajuanSuratController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\PengumumanController;
use App\Http\Controllers\Admin\KontakPesanController;
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

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
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

    Route::get('/kabar', [KabarController::class, 'index'])->name('kabar.index');
    Route::get('/kabar/{slug}', [KabarController::class, 'show'])->name('kabar.show');
    // pengumuman
    Route::get('/pengumuman', [PengumumanController::class, 'index'])
        ->name('pengumuman.index');
    Route::get('/pengumuman/{pengumuman}', [PengumumanController::class, 'show'])
        ->name('pengumuman.show');
    // kontak
    Route::get('/kontak', [KontakController::class, 'index'])
        ->name('kontak.index');
    Route::post('/kontak', [KontakController::class, 'store'])
        ->name('kontak.store');
    // Layanan
    Route::get('/layanan', [LayananController::class, 'index'])->name('layanan.index');
    // Pengajuan Surat
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

    // ✅ PDF (USER – setelah status selesai)
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

                Route::get('/kontak', 
            [KontakPesanController::class, 'index']
        )->name('kontak.index');

        Route::get('/kontak/{kontakPesan}', 
            [KontakPesanController::class, 'show']
        )->name('kontak.show');

        Route::delete('/kontak/{kontakPesan}', 
            [KontakPesanController::class, 'destroy']
        )->name('kontak.destroy');
});

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';