<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - WBS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-900 text-white p-4 shadow">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Admin Dashboard WBS</h1>
            <a href="/" class="text-sm hover:underline">Lihat Website Publik</a>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto p-6">
        <h2 class="text-2xl font-bold mb-6">Daftar Laporan Masuk</h2>
        
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kode</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kategori</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Terlapor</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($reports as $report)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap font-mono text-sm text-blue-600">{{ $report->tracking_code }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $report->jenis_pelanggaran }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $report->nama_terlapor }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                @if($report->status == 'Baru') bg-yellow-100 text-yellow-800
                                @elseif($report->status == 'Diverifikasi') bg-blue-100 text-blue-800
                                @elseif($report->status == 'Diproses') bg-purple-100 text-purple-800
                                @else bg-green-100 text-green-800 @endif">
                                {{ $report->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $report->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('admin.report.show', $report->id) }}" class="text-blue-600 hover:text-blue-900">Lihat Detail</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">Belum ada laporan masuk.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $reports->links() }}
        </div>
    </div>
</body>
</html>