<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function show($id)
    {
        $report = Report::with('evidences')->findOrFail($id);
        return view('admin.report-detail', compact('report'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Baru,Diverifikasi,Diproses,Selesai',
            'catatan_admin' => 'nullable|string'
        ]);

        $report = Report::findOrFail($id);
        $report->status = $request->status;
        $report->catatan_admin = $request->catatan_admin;
        $report->save();

        return redirect()->route('admin.report.show', $id)->with('success', 'Status berhasil diperbarui!');
    }
}