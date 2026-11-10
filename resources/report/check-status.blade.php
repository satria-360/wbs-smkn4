<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Status Laporan - WBS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="max-w-2xl mx-auto py-12 px-4">
        <a href="/" class="text-blue-800 hover:underline mb-6 inline-block">← Kembali ke Beranda</a>
        
        <div class="bg-white p-8 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Cek Status Laporan</h2>
            
            <form action="{{ route('report.check.post') }}" method="POST" class="mb-8">
                @csrf
                <div class="flex gap-2">
                    <input type="text" name="tracking_code" placeholder="Masukkan Kode Tracking (Contoh: WBS-A1B2C3)" 
                           class="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 uppercase" 
                           value="{{ request('tracking_code') }}" required>
                    <button type="submit" class="bg-blue-800 text-white px-6 py-2 rounded-md font-semibold hover:bg-blue-900">Cek</button>
                </div>
            </form>

            @if(isset($report))
                <div class="border-t pt-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold">Status Laporan</h3>
                        <span class="px-3 py-1 rounded-full text-sm font-bold 
                            @if($report->status == 'Baru') bg-yellow-100 text-yellow-800
                            @elseif($report->status == 'Diverifikasi') bg-blue-100 text-blue-800
                            @elseif($report->status == 'Diproses') bg-purple-100 text-purple-800
                            @else bg-green-100 text-green-800 @endif">
                            {{ $report->status }}
                        </span>
                    </div>
                    <p class="text-gray-600 text-sm mb-2"><strong>Kategori:</strong> {{ $report->jenis_pelanggaran }}</p>
                    <p class="text-gray-600 text-sm mb-2"><strong>Tanggal Lapor:</strong> {{ $report->created_at->format('d M Y, H:i') }}</p>
                    
                    @if($report->catatan_admin)
                        <div class="mt-4 bg-gray-50 p-4 rounded-md border border-gray-200">
                            <p class="text-sm font-semibold text-gray-700 mb-1">Catatan dari Petugas:</p>
                            <p class="text-sm text-gray-600">{{ $report->catatan_admin }}</p>
                        </div>
                    @else
                        <p class="text-sm text-gray-500 italic mt-4">Belum ada catatan dari petugas.</p>
                    @endif
                </div>
            @elseif(request()->isMethod('post'))
                <div class="bg-red-50 text-red-700 p-4 rounded-md text-center">
                    Kode tracking tidak ditemukan. Pastikan kode yang Anda masukkan benar.
                </div>
            @endif
        </div>
    </div>
</body>
</html>