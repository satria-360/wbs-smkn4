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

Route::get('/cek-status', function () {
    return view('report.check-status');
})->name('report.check');

Route::post('/cek-status', function (\Illuminate\Http\Request $request) {
    $request->validate(['tracking_code' => 'required']);
    $report = \App\Models\Report::where('tracking_code', strtoupper(trim($request->tracking_code)))->first();

    if ($request->wantsJson() || $request->ajax()) {
        if (!$report) {
            return response()->json([
                'found' => false,
                'message' => 'Nomor register tidak ditemukan. Pastikan nomor yang Anda masukkan benar (Contoh: WBS-XXXXXX).'
            ]);
        }
        return response()->json([
            'found' => true,
            'report' => [
                'tracking_code' => $report->tracking_code,
                'status' => $report->status,
                'jenis_pelanggaran' => $report->jenis_pelanggaran,
                'tanggal' => $report->created_at ? $report->created_at->format('d M Y, H:i') : '-',
                'catatan_admin' => $report->catatan_admin,
            ]
        ]);
    }

    return view('report.check-status', compact('report'));
})->name('report.check.post');