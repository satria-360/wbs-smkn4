<?php

use Illuminate\Support\Facades\Route;

// Halaman Beranda
Route::get('/', function () {
    return view('beranda');
});

// Route untuk menyimpan pengaduan
Route::post('/pengaduan', function () {
    return redirect()->back()->with('success', 'Laporan berhasil dikirim! Simpan kode tracking Anda.');
})->name('pengaduan.store');    