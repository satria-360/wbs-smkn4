<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\ReportEvidence;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'jenis_pelanggaran' => 'required',
            'indikasi_apa' => 'required',
            'lokasi_kejadian' => 'required',
            'waktu_kejadian' => 'required',
            'nama_terlapor' => 'required',
            'kronologis' => 'required',
            'email' => 'required|email',
            'bukti.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf,mp4,zip,rar|max:51200', // Max 50MB
        ]);

        // Generate Kode Tracking Unik (Contoh: WBS-A1B2C3)
        $trackingCode = 'WBS-' . strtoupper(Str::random(6));

        // Simpan data laporan
        $report = Report::create([
            'tracking_code' => $trackingCode,
            'jenis_pelanggaran' => $validated['jenis_pelanggaran'],
            'indikasi_apa' => $validated['indikasi_apa'],
            'lokasi_kejadian' => $validated['lokasi_kejadian'],
            'waktu_kejadian' => $validated['waktu_kejadian'],
            'nama_terlapor' => $validated['nama_terlapor'],
            'nuptk_terlapor' => $request->nuptk_terlapor ? strtoupper($request->nuptk_terlapor) : null,
            'kronologis' => $validated['kronologis'],
            'nama_pelapor' => $request->nama_pelapor ?? null,
            'nis' => $request->nis ?? null,
            'nuptk_pelapor' => $request->nuptk_pelapor ? strtoupper($request->nuptk_pelapor) : ($request->nip_pelapor ? strtoupper($request->nip_pelapor) : null),
            'email' => $validated['email'],
            'no_hp' => $request->no_hp,
            'is_anonymous' => $request->has('is_anonymous') || empty($request->nama_pelapor),
        ]);

        // Handle Upload File (Disimpan di folder private agar aman)
        if ($request->hasFile('bukti')) {
            foreach ($request->file('bukti') as $file) {
                $path = $file->store('private/reports', 'local');
                ReportEvidence::create([
                    'report_id' => $report->id,
                    'file_path' => $path,
                    'file_type' => $file->getClientOriginalExtension(),
                ]);
            }
        }

        // Redirect ke halaman sukses dengan membawa kode tracking
        return redirect()->route('report.success', ['code' => $trackingCode]);
    }

    public function success($code)
    {
        return view('report.success', compact('code'));
    }
}