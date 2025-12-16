<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\Admin\AdminController;

Route::get('/', function () {
    return view('welcome');
});
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
// admin
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin_dashboard');
Route::get('admin/login', [AdminController::class, 'login'])->name('admin_login');
Route::get('admin/login_submit', [AdminController::class, 'login_submit'])->name('admin_login_submit');
Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin_logout');