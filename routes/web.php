<?php
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('home', ['title'=>'Home Page']);
});
Route::get('/kabar', function () {
    return view('kabar', ['title'=>'Kabar Page']);
});
Route::get('/kontak', function () {
    return view('kontak', ['title'=>'Kontak Page']);
});
Route::get('/layanan', function () {
    return view('layanan', ['title'=>'Layanan Page']);
});
Route::get('/pengumuman', function () {
    return view('pengumuman', ['title'=>'Pengumuman Page']);
});
Route::get('/profilDesa', function () {
    return view('profilDesa', ['title'=>'Profil Desa Page']);
});