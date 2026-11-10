<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Laporan - {{ $report->tracking_code }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="max-w-4xl mx-auto p-6">
        <a href="{{ route('admin.dashboard') }}" class="text-blue-800 hover:underline mb-4 inline-block">← Kembali ke Dashboard</a>
        
        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h2 class="text-2xl font-bold">Detail Laporan</h2>
                    <p class="text-gray-500 font-mono">Kode: {{ $report->tracking_code }}</p>
                </div>
                <span class="px-3 py-1 rounded-full text-sm font-bold bg-blue-100 text-blue-800">{{ $report->status }}</span>
            </div>

            <div class="grid grid-cols-2 gap-4 text-sm mb-6">
                <div><strong>Kategori:</strong> {{ $report->jenis_pelanggaran }}</div>
                <div><strong>Waktu Kejadian:</strong> {{ \Carbon\Carbon::parse($report->waktu_kejadian)->format('d M Y, H:i') }}</div>
                <div><strong>Lokasi:</strong> {{ $report->lokasi_kejadian }}</div>
                <div><strong>Nama Terlapor:</strong> {{ $report->nama_terlapor }} {{ $report->nuptk_terlapor ? '('.$report->nuptk_terlapor.')' : '' }}</div>
                <div><strong>Pelapor:</strong> {{ $report->is_anonymous ? 'ANONIM' : $report->nama_pelapor }}</div>
                <div><strong>Kontak:</strong> {{ $report->email }} / {{ $report->no_hp }}</div>
            </div>

            <div class="mb-6">
                <h3 class="font-bold mb-2">Kronologis:</h3>
                <p class="text-gray-700 bg-gray-50 p-4 rounded whitespace-pre-wrap">{{ $report->kronologis }}</p>
            </div>

            @if($report->evidences->count() > 0)
            <div class="mb-6">
                <h3 class="font-bold mb-2">Bukti Terlampir:</h3>
                <ul class="list-disc pl-5 text-blue-600">
                    @foreach($report->evidences as $evidence)
                        <li>{{ $evidence->file_path }} ({{ $evidence->file_type }})</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {{-- Form Update Status --}}
            <form action="{{ route('admin.report.update', $report->id) }}" method="POST" class="border-t pt-6">
                @csrf
                <h3 class="font-bold mb-3">Update Status & Catatan</h3>
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <select name="status" class="border rounded px-3 py-2 w-full" required>
                        <option value="Baru" {{ $report->status == 'Baru' ? 'selected' : '' }}>Baru</option>
                        <option value="Diverifikasi" {{ $report->status == 'Diverifikasi' ? 'selected' : '' }}>Diverifikasi</option>
                        <option value="Diproses" {{ $report->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                        <option value="Selesai" {{ $report->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>
                <textarea name="catatan_admin" rows="3" class="border rounded px-3 py-2 w-full mb-4" placeholder="Catatan untuk pelapor (opsional)">{{ $report->catatan_admin }}</textarea>
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</body>
</html>