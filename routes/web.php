<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\Admin\AdminController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::redirect('/', '/login');

Route::view('/kontak','kontak')->name('kontak');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
/* Admin */
use App\Http\Controllers\Admin\TentangDesaController;
use App\Http\Controllers\Admin\PengumumanController;
use App\Http\Controllers\Admin\ProgressPembangunanController;
use App\Http\Controllers\Admin\GaleriController;

Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', fn () =>
        view('admin.dashboard', ['title' => 'Dashboard'])
    )->name('dashboard');

    Route::get('/tentang-desa', [TentangDesaController::class, 'index'])
        ->name('tentang-desa.index');

    Route::get('/tentang-desa/edit', [TentangDesaController::class, 'edit'])
        ->name('tentang-desa.edit');

    Route::put('/tentang-desa', [TentangDesaController::class, 'update'])
        ->name('tentang-desa.update');

    Route::resource('pengumuman', PengumumanController::class);

    Route::resource('progress-pembangunan', ProgressPembangunanController::class);

    Route::resource('galeri', GaleriController::class);
});



Route::prefix('admin')->group(function () {

    // redirect older admin login url to unified login page with role=admin
    Route::get('/login', function () {
        return redirect()->route('login', ['role' => 'admin']);
    })->name('admin_login');
    Route::post('/login-submit', [AdminController::class, 'login_submit'])->name('admin_login_submit');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin_logout');

    // FORGET PASSWORD (PAKAI URL YANG SAMA)
    Route::get('/forget-password', [AdminController::class, 'forget_password'])
        ->name('admin_forget_password');
        
        Route::post('/forget-password', [AdminController::class, 'forget_password_submit'])
        ->name('admin_forget_password_submit');
        
        Route::get('/reset-password/{token}/{email}', [AdminController::class, 'reset_password'])
        ->name('admin_reset_password');

        Route::post('/reset-password-submit', [AdminController::class, 'reset_password_submit'])
            ->name('admin_reset_password_submit');
});