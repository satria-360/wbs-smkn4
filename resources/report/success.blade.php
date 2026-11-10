<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Berhasil - WBS SMKN 4 Bandung</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full text-center">
        <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-green-100 mb-4">
            <svg class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
        </div>
        <h2 class="text-2xl font-bold text-gray-900 mb-2">Laporan Berhasil Dikirim!</h2>
        <p class="text-gray-600 mb-6">Simpan kode berikut untuk mengecek status laporan Anda:</p>
        
        <div class="bg-blue-50 border-2 border-blue-200 rounded-lg p-4 mb-6">
            <p class="text-sm text-blue-600 font-semibold mb-1">KODE TRACKING ANDA</p>
            <p class="text-3xl font-bold text-blue-800 tracking-wider">{{ $code }}</p>
        </div>

        <p class="text-xs text-gray-500 mb-6">Jangan berikan kode ini kepada siapapun selain petugas WBS resmi.</p>

        <a href="/" class="block w-full bg-blue-800 text-white font-bold py-3 rounded-md hover:bg-blue-900 transition">
            Kembali ke Beranda
        </a>
    </div>
</body>
</html>