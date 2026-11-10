<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WBS - SMKN 4 Bandung</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,700&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-serif-italic { font-family: 'Playfair Display', serif; font-style: italic; }
        .hero-overlay {
            background: linear-gradient(to bottom, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0.3) 50%, rgba(0,0,0,0.5) 100%);
        }
        .form-input {
            @apply w-full px-3 py-2.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm;
        }
        .form-label {
            @apply block text-sm font-medium text-gray-700 mb-1.5;
        }
        .required::after {
            content: ' *';
            color: #dc2626;
        }
        html { scroll-behavior: smooth; }
    </style>
</head>
<body class="bg-gray-50">

    {{-- ==================== NAVBAR (DENGAN SCROLL SPY) ==================== --}}
    <nav class="bg-blue-800 shadow-lg sticky top-0 z-50" x-data="{ 
        activeSection: 'beranda',
        mobileMenuOpen: false,
        init() {
            const sections = document.querySelectorAll('section[id]');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        this.activeSection = entry.target.id;
                    }
                });
            }, { 
                rootMargin: '-40% 0px -60% 0px', 
                threshold: 0 
            });
            sections.forEach(section => observer.observe(section));
        }
    }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                
                {{-- Logo --}}
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('images/logo-smkn4.png') }}" 
                         alt="Logo SMKN 4 Bandung" 
                         class="h-14 w-auto"
                         onerror="this.src='https://via.placeholder.com/60x60/ffffff/1e3a8a?text=SMKN4'">
                    <div class="text-white">
                        <div class="font-bold text-lg leading-tight">WBS</div>
                        <div class="text-xs text-blue-200">SMKN 4 BANDUNG</div>
                    </div>
                </div>

                {{-- Menu Navigasi Desktop --}}
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#beranda" 
                       @click.prevent="activeSection = 'beranda'; document.getElementById('beranda').scrollIntoView({behavior: 'smooth'})"
                       :class="activeSection === 'beranda' ? 'text-yellow-400' : 'text-white hover:text-yellow-400'"
                       class="font-semibold text-sm tracking-wide transition-colors duration-300">
                        BERANDA
                    </a>
                    <a href="#cara-kerja" 
                       @click.prevent="activeSection = 'cara-kerja'; document.getElementById('cara-kerja').scrollIntoView({behavior: 'smooth'})"
                       :class="activeSection === 'cara-kerja' ? 'text-yellow-400' : 'text-white hover:text-yellow-400'"
                       class="font-semibold text-sm tracking-wide transition-colors duration-300">
                        CARA KERJA
                    </a>
                    <a href="#buat-pengaduan" 
                       @click.prevent="activeSection = 'buat-pengaduan'; document.getElementById('buat-pengaduan').scrollIntoView({behavior: 'smooth'})"
                       :class="activeSection === 'buat-pengaduan' ? 'text-yellow-400' : 'text-white hover:text-yellow-400'"
                       class="font-semibold text-sm tracking-wide transition-colors duration-300">
                        BUAT PENGADUAN
                    </a>
                    <a href="#cek-status" 
                       @click.prevent="activeSection = 'cek-status'; document.getElementById('cek-status').scrollIntoView({behavior: 'smooth'})"
                       :class="activeSection === 'cek-status' ? 'text-yellow-400' : 'text-white hover:text-yellow-400'"
                       class="font-semibold text-sm tracking-wide transition-colors duration-300">
                        CEK STATUS
                    </a>
                    <a href="#faq" 
                       @click.prevent="activeSection = 'faq'; document.getElementById('faq').scrollIntoView({behavior: 'smooth'})"
                       :class="activeSection === 'faq' ? 'text-yellow-400' : 'text-white hover:text-yellow-400'"
                       class="font-semibold text-sm tracking-wide transition-colors duration-300">
                        FAQ
                    </a>
                    <a href="#peraturan" 
                       @click.prevent="activeSection = 'peraturan'; document.getElementById('peraturan').scrollIntoView({behavior: 'smooth'})"
                       :class="activeSection === 'peraturan' ? 'text-yellow-400' : 'text-white hover:text-yellow-400'"
                       class="font-semibold text-sm tracking-wide transition-colors duration-300">
                        PERATURAN
                    </a>
                </div>

                {{-- Mobile Menu Button --}}
                <div class="md:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-white focus:outline-none">
                        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  :d="mobileMenuOpen ? 'M6 18L18 6M6 6l12 12' : 'M4 6h16M4 12h16M4 18h16'"/>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Mobile Menu --}}
            <div x-show="mobileMenuOpen" 
                 x-transition
                 class="md:hidden pb-4 border-t border-blue-700 mt-2 pt-2">
                <a href="#beranda" @click="activeSection = 'beranda'; mobileMenuOpen = false" :class="activeSection === 'beranda' ? 'text-yellow-400' : 'text-white'" class="block font-semibold py-2 text-sm">BERANDA</a>
                <a href="#cara-kerja" @click="activeSection = 'cara-kerja'; mobileMenuOpen = false" :class="activeSection === 'cara-kerja' ? 'text-yellow-400' : 'text-white'" class="block font-semibold py-2 text-sm">CARA KERJA</a>
                <a href="#buat-pengaduan" @click="activeSection = 'buat-pengaduan'; mobileMenuOpen = false" :class="activeSection === 'buat-pengaduan' ? 'text-yellow-400' : 'text-white'" class="block font-semibold py-2 text-sm">BUAT PENGADUAN</a>
                <a href="#cek-status" @click="activeSection = 'cek-status'; mobileMenuOpen = false" :class="activeSection === 'cek-status' ? 'text-yellow-400' : 'text-white'" class="block font-semibold py-2 text-sm">CEK STATUS</a>
                <a href="#faq" @click="activeSection = 'faq'; mobileMenuOpen = false" :class="activeSection === 'faq' ? 'text-yellow-400' : 'text-white'" class="block font-semibold py-2 text-sm">FAQ</a>
                <a href="#peraturan" @click="activeSection = 'peraturan'; mobileMenuOpen = false" :class="activeSection === 'peraturan' ? 'text-yellow-400' : 'text-white'" class="block font-semibold py-2 text-sm">PERATURAN</a>
            </div>
        </div>
    </nav>

    {{-- ==================== HERO SECTION ==================== --}}
    <section id="beranda" class="relative h-screen min-h-[600px] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ asset('images/gedung-smkn4.jpg') }}" 
                 alt="Gedung SMKN 4 Bandung" 
                 class="w-full h-full object-cover"
                 onerror="this.src='https:smkn4bdg.jpeg'">
        </div>
        <div class="hero-overlay absolute inset-0"></div>
        <div class="relative z-10 text-center px-4 max-w-5xl mx-auto">
            <h1 class="font-serif-italic text-white text-5xl md:text-7xl font-bold mb-6 drop-shadow-lg">
                Whistleblowing System (WBS)
            </h1>
            <h2 class="text-white text-3xl md:text-5xl font-extrabold tracking-wide mb-10 drop-shadow-lg uppercase">
                SMKN 4 BANDUNG
            </h2>
            <a href="#cara-kerja" 
               class="inline-block bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-bold text-lg px-10 py-4 rounded-md shadow-xl transform hover:scale-105 transition-all duration-300">
                CARA KERJA WBS
            </a>
        </div>
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-8 h-8 text-white opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
            </svg>
        </div>
    </section>

    {{-- ==================== SECTION CARA KERJA ==================== --}}
    <section id="cara-kerja" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 clasps="text-4xl font-bold text-center text-gray-900 mb-4">Cara Kerja WBS</h2>
            <p class="text-center text-gray-600 mb-12">Bagaimana Whistleblowing System bekerja?</p>
            <div class="grid md:grid-cols-3 gap-10">
                <div class="text-center">
                    <div class="mx-auto w-32 h-32 bg-yellow-400 rounded-full flex items-center justify-center mb-6 shadow-lg">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Mengisi Formulir</h3>
                    <p class="text-gray-600 leading-relaxed">Pelapor mengisi Formulir pada Website WBS SMKN 4 Bandung. Pelapor mengunggah bukti pendukung dalam bentuk foto, file atau sejenisnya, dan mengirim laporan.</p>
                </div>
                <div class="text-center">
                    <div class="mx-auto w-32 h-32 bg-yellow-400 rounded-full flex items-center justify-center mb-6 shadow-lg">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Laporan diterima</h3>
                    <p class="text-gray-600 leading-relaxed">Laporan yang diterima akan <strong class="text-gray-800">diverifikasi</strong> terlebih dahulu oleh tim WBS SMKN 4 Bandung.</p>
                </div>
                <div class="text-center">
                    <div class="mx-auto w-32 h-32 bg-yellow-400 rounded-full flex items-center justify-center mb-6 shadow-lg">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Verifikasi Laporan</h3>
                    <p class="text-gray-600 leading-relaxed">Pelapor akan mendapatkan <strong class="text-gray-800">Nomor Register</strong> untuk melihat <strong class="text-gray-800">Status Laporan</strong> yang diajukan.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ==================== SECTION BUAT PENGADUAN (SPACING DIPERBAIKI) ==================== --}}
    <section id="buat-pengaduan" class="py-20 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Header --}}
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900 mb-2">BUAT PENGADUAN</h2>
                <p class="text-sm text-gray-600 italic">Formulir Pengaduan/Pelaporan Whistleblowing System</p>
            </div>

            {{-- Form Container --}}
            <form id="wbs-form" action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow-md p-10" x-data="{ 
                isAnonymous: false,
                fileName: '',
                showConfirmModal: false
            }">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8">
                    
                    {{-- ==================== KOLOM KIRI ==================== --}}
                    <div class="space-y-6">
                        
                        {{-- Checkbox Anonim --}}
                        <div class="flex items-center mb-6">
                            <input type="checkbox" id="is_anonymous" name="is_anonymous" x-model="isAnonymous" 
                                   class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="is_anonymous" class="ml-2 text-sm text-gray-700">
                                Lapor sebagai Anonim (Identitas dirahasiakan)
                            </label>
                        </div>

                        {{-- Nama Pelapor --}}
                        <div x-show="!isAnonymous" x-transition>
                            <label class="form-label">Nama Pelapor</label>
                            <input type="text" name="nama_pelapor" class="form-input" placeholder="Masukkan nama lengkap">
                        </div>

                        {{-- NIS (Ditampilkan di BAWAH nama, sesuai preferensi) --}}
                        <div x-show="!isAnonymous" x-transition>
                            <label class="form-label">Nomor Induk Siswa (NIS)</label>
                            <input type="text" name="nis" class="form-input" placeholder="Contoh: 12345">
                            <p class="text-xs text-gray-500 mt-1">* Hanya untuk pelapor siswa</p>
                        </div>

                        {{-- NIP/NUPTK Pelapor (Uppercase) --}}
                        <div x-show="!isAnonymous" x-transition>
                            <label class="form-label">NIP / NUPTK (Jika Guru/Tendik)</label>
                            <input type="text" name="nuptk_pelapor" class="form-input uppercase" 
                                   placeholder="Masukkan NIP atau NUPTK"
                                   style="text-transform: uppercase;">
                        </div>

                        {{-- Email --}}
                        <div>
                            <label class="form-label required">Email</label>
                            <input type="email" name="email" class="form-input" 
                                   placeholder="Email yang dapat dihubungi" required>
                            <p class="text-xs text-gray-500 mt-1">* Wajib diisi untuk tindak lanjut</p>
                        </div>

                        {{-- Nomor Telepon --}}
                        <div>
                            <label class="form-label">Nomor Telepon / HP</label>
                            <input type="tel" name="no_hp" class="form-input" 
                                   placeholder="Nomor yang dapat dihubungi (Opsional)">
                        </div>

                    </div>

                    {{-- ==================== KOLOM KANAN ==================== --}}
                    <div class="space-y-6">
                        
                        {{-- Jenis Pelanggaran --}}
                        <div>
                            <label class="form-label required">Jenis Pelanggaran</label>
                            <select name="jenis_pelanggaran" class="form-input" required>
                                <option value="">-- Pilih Jenis Pelanggaran --</option>
                                <option value="bullying">Perundungan (Bullying)</option>
                                <option value="kekerasan">Kekerasan/Pelecehan</option>
                                <option value="pungli">Pungutan Liar (Pungli)</option>
                                <option value="korupsi">Kecurangan/Korupsi</option>
                                <option value="kode_etik">Pelanggaran Kode Etik</option>
                                <option value="fasilitas">Perusakan Fasilitas Sekolah</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>

                        {{-- Indikasi Perbuatan (Apa) --}}
                        <div>
                            <label class="form-label required">Indikasi Perbuatan Pelanggaran yang Diketahui (Apa)</label>
                            <input type="text" name="indikasi_apa" class="form-input" 
                                   placeholder="Jelaskan secara singkat perbuatan pelanggaran" required>
                        </div>

                        {{-- Lokasi Kejadian (Dimana) --}}
                        <div>
                            <label class="form-label required">Lokasi Kejadian (Dimana)</label>
                            <input type="text" name="lokasi_kejadian" class="form-input" 
                                   placeholder="Contoh: Ruang Kelas XII RPL 1, Lab Komputer, dll" required>
                        </div>

                        {{-- Waktu Kejadian (Kapan) --}}
                        <div>
                            <label class="form-label required">Waktu Kejadian (Kapan)</label>
                            <input type="datetime-local" name="waktu_kejadian" class="form-input" required>
                        </div>

                        {{-- Nama Terlapor --}}
                        <div>
                            <label class="form-label required">Nama Terlapor</label>
                            <input type="text" name="nama_terlapor" class="form-input" 
                                   placeholder="Nama orang yang dilaporkan" required>
                        </div>

                        {{-- NUPTK Terlapor (Otomatis UPPERCASE) --}}
                        <div>
                            <label class="form-label">NUPTK Terlapor (Jika Guru)</label>
                            <input type="text" name="nuptk_terlapor" class="form-input uppercase" 
                                   placeholder="Masukkan NUPTK terlapor"
                                   style="text-transform: uppercase;">
                        </div>

                        {{-- Kronologis Kejadian (Bagaimana) --}}
                        <div>
                            <label class="form-label required">Kronologis Kejadian (Bagaimana)</label>
                            <textarea name="kronologis" rows="6" class="form-input" 
                                      placeholder="Jelaskan kronologi kejadian secara detail..." required></textarea>
                        </div>

                    </div>
                </div>

                {{-- ==================== UPLOAD BUKTI ==================== --}}
                <div class="mt-10 pt-8 border-t border-gray-200">
                    <label class="form-label required text-base font-semibold">Unggah Bukti</label>
                    
                    <div class="mt-4 flex justify-center rounded-lg border-2 border-dashed border-gray-300 px-6 py-8 hover:border-blue-500 transition-colors bg-gray-50">
                        <div class="text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="mt-4 flex text-sm leading-6 text-gray-600 justify-center items-center">
                                <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-blue-600 focus-within:outline-none hover:text-blue-500 px-4 py-2 border border-gray-300 shadow-sm">
                                    <span>Choose File</span>
                                    <input id="file-upload" name="bukti[]" type="file" multiple class="sr-only" 
                                           accept=".jpg,.jpeg,.png,.pdf,.mp4,.zip,.rar"
                                           @change="fileName = Array.from($event.target.files).map(f => f.name).join(', ')">
                                </label>
                                <span class="ml-3 text-gray-500 self-center" x-show="!fileName">No file chosen</span>
                                <span class="ml-3 text-green-600 font-medium self-center break-all" x-show="fileName" x-text="fileName"></span>
                            </div>
                            <p class="text-xs leading-5 text-gray-600 mt-3">PNG, JPG, PDF, MP4, ZIP, RAR hingga 20MB per file</p>
                        </div>
                    </div>
                    
                    <p class="text-xs text-gray-500 mt-3 italic">
                        *) File yang diperbolehkan berupa pdf, foto, audio, atau video (dapat berupa satu berkas dalam bentuk *.zip atau *.rar). Maksimal ukuran 20 MB.
                    </p>
                </div>

                {{-- ==================== CAPTCHA ==================== --}}
                <div class="mt-10 pt-6 border-t border-gray-200">
                    <label class="form-label font-semibold text-gray-800 mb-3 block">Kode Keamanan (CAPTCHA)</label>
                    <div class="flex items-center space-x-6">
                        <div class="bg-gray-200 border-2 border-gray-300 px-6 py-3 rounded">
                            <span class="font-mono text-xl tracking-widest text-gray-700 font-bold">7X9K2M</span>
                        </div>
                        <div class="flex-1 max-w-xs">
                            <input type="text" name="captcha" class="form-input" placeholder="Masukkan kode di atas" required>
                            <p class="text-xs text-gray-500 mt-1">* Ketik kode yang terlihat</p>
                        </div>
                    </div>
                </div>

                {{-- ==================== TOMBOL KIRIM ==================== --}}
                <div class="mt-10 pt-6">
                    <button type="button" 
                            @click="showConfirmModal = true"
                            class="w-full md:w-1/3 bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold py-4 px-8 rounded-md shadow-md transform hover:scale-[1.02] transition-all duration-200 text-lg">
                        KIRIM
                    </button>
                </div>

                {{-- ==================== POP-UP KONFIRMASI ==================== --}}
                <div x-show="showConfirmModal" 
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4"
                     style="display: none;">
                    
                    <div class="bg-white rounded-lg shadow-2xl max-w-md w-full p-6">
                        <div class="flex items-center mb-4">
                            <svg class="h-8 w-8 text-red-600 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                            <h3 class="text-lg font-bold text-gray-900">Peringatan Penting</h3>
                        </div>
                        
                        <p class="text-sm text-gray-700 mb-6">
                            Apakah Anda yakin data yang diisi sudah benar? 
                            <span class="font-semibold text-red-600">Membuat laporan palsu atau fitnah dapat dikenakan sanksi disiplin sekolah dan tuntutan hukum sesuai peraturan yang berlaku.</span>
                        </p>
                        
                        <div class="flex justify-end space-x-3">
                            <button type="button" 
                                    @click="showConfirmModal = false"
                                    class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition">
                                Batal
                            </button>
                            <button type="button" 
                                    @click="showConfirmModal = false; document.getElementById('wbs-form').submit()"
                                    class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition font-semibold">
                                Ya, Kirim Laporan
                            </button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </section>

    {{-- ==================== SECTION CEK STATUS (Placeholder) ==================== --}}
    <section id="cek-status" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">CEK STATUS</h2>
            <p class="text-gray-600">Fitur cek status laporan menggunakan Kode Register akan segera tersedia.</p>
        </div>
    </section>

    {{-- ==================== SECTION FAQ (Placeholder) ==================== --}}
    <section id="faq" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">FAQ</h2>
            <p class="text-gray-600">Frequently Asked Questions akan segera tersedia.</p>
        </div>
    </section>

    {{-- ==================== SECTION PERATURAN (Placeholder) ==================== --}}
    <section id="peraturan" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">PERATURAN</h2>
            <p class="text-gray-600">Peraturan terkait WBS SMKN 4 Bandung akan segera tersedia.</p>
        </div>
    </section>

    {{-- ==================== FOOTER ==================== --}}
    <footer class="bg-blue-900 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-blue-200">&copy; 2026 Whistleblowing System - SMKN 4 Bandung. All rights reserved.</p>
            <p class="text-blue-300 text-sm mt-2">Jl. Kliningan No.6, Turangga, Kec. Lengkong, Kota Bandung, Jawa Barat</p>
        </div>
    </footer>

</body>
</html>