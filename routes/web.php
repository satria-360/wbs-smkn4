<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReportController as AdminReportController;

// Group Route Admin (Nanti bisa ditambah middleware auth)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/report/{id}', [AdminReportController::class, 'show'])->name('report.show');
    Route::post('/report/{id}/update', [AdminReportController::class, 'updateStatus'])->name('report.update');
});

// Route untuk menyimpan laporan
Route::post('/pengaduan', [ReportController::class, 'store'])->name('pengaduan.store');

// Route halaman sukses setelah lapor
Route::get('/laporan-berhasil/{code}', [ReportController::class, 'success'])->name('report.success');

// Halaman Beranda
Route::get('/', function () {
    return view('beranda');
});

// Route untuk menyimpan pengaduan
Route::post('/pengaduan', function () {
    return redirect()->back()->with('success', 'Laporan berhasil dikirim! Simpan kode tracking Anda.');
})->name('pengaduan.store');  

Route::get('/cek-status', function () {
    return view('report.check-status');
})->name('report.check');

Route::post('/cek-status', function (\Illuminate\Http\Request $request) {
    $request->validate(['tracking_code' => 'required']);
    $report = \App\Models\Report::where('tracking_code', strtoupper($request->tracking_code))->first();
    return view('report.check-status', compact('report'));
})->name('report.check.post');