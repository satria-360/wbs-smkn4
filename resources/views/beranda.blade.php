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
            background: linear-gradient(to bottom, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.5) 50%, rgba(0,0,0,0.7) 100%);
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
                    <img src="{{ asset('image/4bdg.jpeg') }}" 
                         alt="Logo SMKN 4 Bandung" 
                         class="h-14 w-auto object-contain rounded-md"
                         onerror="this.src='{{ asset('images/4bdg.jpeg') }}'">
                    <div class="text-white">
                        <div class="font-bold text-lg leading-tight">WBS</div>
                        <div class="text-xs text-gray-950">SMKN 4 BANDUNG</div>
                    </div>
                </div>

                {{-- Menu Navigasi Desktop --}}
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#beranda" 
                       @click.prevent="activeSection = 'beranda'; document.getElementById('beranda').scrollIntoView({behavior: 'smooth'})"
                       :class="activeSection === 'beranda' ? 'text-gray-950 font-bold border-b-2 border-gray-950' : 'text-white hover:text-blue-200'"
                       class="font-semibold text-sm tracking-wide transition-colors duration-300 py-1"> 
                        BERANDA
                    </a>
                    <a href="#cara-kerja" 
                       @click.prevent="activeSection = 'cara-kerja'; document.getElementById('cara-kerja').scrollIntoView({behavior: 'smooth'})"
                       :class="activeSection === 'cara-kerja' ? 'text-gray-950 font-bold border-b-2 border-gray-950' : 'text-white hover:text-blue-200'"
                       class="font-semibold text-sm tracking-wide transition-colors duration-300 py-1">
                        CARA KERJA
                    </a>
                    <a href="#buat-pengaduan" 
                       @click.prevent="activeSection = 'buat-pengaduan'; document.getElementById('buat-pengaduan').scrollIntoView({behavior: 'smooth'})"
                       :class="activeSection === 'buat-pengaduan' ? 'text-gray-950 font-bold border-b-2 border-gray-950' : 'text-white hover:text-blue-200'"
                       class="font-semibold text-sm tracking-wide transition-colors duration-300 py-1">
                        BUAT PENGADUAN
                    </a>
                    <a href="#cek-status" 
                       @click.prevent="activeSection = 'cek-status'; document.getElementById('cek-status').scrollIntoView({behavior: 'smooth'})"
                       :class="activeSection === 'cek-status' ? 'text-gray-950 font-bold border-b-2 border-gray-950' : 'text-white hover:text-blue-200'"
                       class="font-semibold text-sm tracking-wide transition-colors duration-300 py-1">
                        CEK STATUS
                    </a>
                    <a href="#faq" 
                       @click.prevent="activeSection = 'faq'; document.getElementById('faq').scrollIntoView({behavior: 'smooth'})"
                       :class="activeSection === 'faq' ? 'text-gray-950 font-bold border-b-2 border-gray-950' : 'text-white hover:text-blue-200'"
                       class="font-semibold text-sm tracking-wide transition-colors duration-300 py-1">
                        FAQ
                    </a>
                    <a href="#peraturan" 
                       @click.prevent="activeSection = 'peraturan'; document.getElementById('peraturan').scrollIntoView({behavior: 'smooth'})"
                       :class="activeSection === 'peraturan' ? 'text-gray-950 font-bold border-b-2 border-gray-950' : 'text-white hover:text-blue-200'"
                       class="font-semibold text-sm tracking-wide transition-colors duration-300 py-1">
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
                <a href="#beranda" @click="activeSection = 'beranda'; mobileMenuOpen = false" :class="activeSection === 'beranda' ? 'text-blue-200 font-bold' : 'text-white'" class="block font-semibold py-2 text-sm">BERANDA</a>
                <a href="#cara-kerja" @click="activeSection = 'cara-kerja'; mobileMenuOpen = false" :class="activeSection === 'cara-kerja' ? 'text-blue-200 font-bold' : 'text-white'" class="block font-semibold py-2 text-sm">CARA KERJA</a>
                <a href="#buat-pengaduan" @click="activeSection = 'buat-pengaduan'; mobileMenuOpen = false" :class="activeSection === 'buat-pengaduan' ? 'text-blue-200 font-bold' : 'text-white'" class="block font-semibold py-2 text-sm">BUAT PENGADUAN</a>
                <a href="#cek-status" @click="activeSection = 'cek-status'; mobileMenuOpen = false" :class="activeSection === 'cek-status' ? 'text-blue-200 font-bold' : 'text-white'" class="block font-semibold py-2 text-sm">CEK STATUS</a>
                <a href="#faq" @click="activeSection = 'faq'; mobileMenuOpen = false" :class="activeSection === 'faq' ? 'text-blue-200 font-bold' : 'text-white'" class="block font-semibold py-2 text-sm">FAQ</a>
                <a href="#peraturan" @click="activeSection = 'peraturan'; mobileMenuOpen = false" :class="activeSection === 'peraturan' ? 'text-blue-200 font-bold' : 'text-white'" class="block font-semibold py-2 text-sm">PERATURAN</a>
            </div>
        </div>
    </nav>

    {{-- ==================== HERO SECTION ==================== --}}
    <section id="beranda" class="relative h-screen min-h-[600px] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ asset('image/smk4.jpeg') }}" 
                 alt="Gedung SMKN 4 Bandung" 
                 class="w-full h-full object-cover"
                 onerror="this.src='{{ asset('image/smk4.jpg') }}'">
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
               class="inline-block bg-blue-800 hover:bg-blue-900 text-white font-bold text-lg px-10 py-4 rounded-md shadow-xl transform hover:scale-105 transition-all duration-300">
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
            <h2 class="text-4xl font-bold text-center text-gray-900 mb-4">Cara Kerja WBS</h2>
            <p class="text-center text-gray-600 mb-12">Bagaimana Whistleblowing System bekerja?</p>
            <div class="grid md:grid-cols-3 gap-10">
                <div class="text-center">
                    <div class="mx-auto w-32 h-32 bg-blue-800 rounded-full flex items-center justify-center mb-6 shadow-lg shadow-blue-800/30">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Mengisi Formulir</h3>
                    <p class="text-gray-600 leading-relaxed">Pelapor mengisi Formulir pada Website WBS SMKN 4 Bandung. Pelapor mengunggah bukti pendukung dalam bentuk foto, file atau sejenisnya, dan mengirim laporan.</p>
                </div>
                <div class="text-center">
                    <div class="mx-auto w-32 h-32 bg-blue-800 rounded-full flex items-center justify-center mb-6 shadow-lg shadow-blue-800/30">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Laporan diterima</h3>
                    <p class="text-gray-600 leading-relaxed">Laporan yang diterima akan <strong class="text-gray-800">diverifikasi</strong> terlebih dahulu oleh tim WBS SMKN 4 Bandung.</p>
                </div>
                <div class="text-center">
                    <div class="mx-auto w-32 h-32 bg-blue-800 rounded-full flex items-center justify-center mb-6 shadow-lg shadow-blue-800/30">
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

    {{-- ==================== SECTION BUAT PENGADUAN ==================== --}}
    <section id="buat-pengaduan" class="py-16 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Header --}}
            <div class="text-center mb-10">
                <h2 class="text-3xl md:text-4xl font-extrabold text-[#222831] tracking-normal mb-1">BUAT PENGADUAN</h2>
                <p class="text-sm text-gray-500 italic">Formulir Pengaduan/Pelaporan Whistleblowing System</p>
            </div>

            {{-- Form Container --}}
            <form id="wbs-form" 
                  action="{{ route('pengaduan.store') }}" 
                  method="POST" 
                  enctype="multipart/form-data" 
                  x-data="buatPengaduanForm()" 
                  x-init="init()"
                  @submit.prevent="validateAndSubmit"
                  class="w-full">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 items-start">
                    
                    {{-- ==================== KOLOM KIRI ==================== --}}
                    <div class="space-y-4">
                        {{-- NIP Pelapor (Opsional) --}}
                        <div>
                            <input type="text" 
                                   name="nip_pelapor" 
                                   placeholder="NIP Pelapor (Opsional)" 
                                   class="w-full px-3.5 py-2.5 text-sm text-gray-700 bg-white border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-blue-400 placeholder-gray-400">
                        </div>

                        {{-- Email (Wajib diisi dengan email yang dapat dihubungi) --}}
                        <div>
                            <input type="email" 
                                   name="email" 
                                   placeholder="Email (Wajib diisi dengan email yang dapat dihubungi)" 
                                   required 
                                   class="w-full px-3.5 py-2.5 text-sm text-gray-700 bg-white border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-blue-400 placeholder-gray-400">
                        </div>

                        {{-- Nomor Telepon / HP --}}
                        <div>
                            <input type="tel" 
                                   name="no_hp" 
                                   placeholder="Nomor Telepon / HP (Nomor yang dapat dihubungi (Opsional))" 
                                   class="w-full px-3.5 py-2.5 text-sm text-gray-700 bg-white border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-blue-400 placeholder-gray-400">
                        </div>
                    </div>

                    {{-- ==================== KOLOM KANAN ==================== --}}
                    <div class="space-y-4">
                        {{-- Jenis Pelanggaran --}}
                        <div>
                            <label class="block text-sm text-gray-800 mb-1 font-normal">Jenis Pelanggaran :</label>
                            <select name="jenis_pelanggaran" required class="w-full px-3.5 py-2.5 text-sm text-gray-700 bg-white border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-blue-400 cursor-pointer">
                                <option value="">-----------</option>
                                <option value="Penyalahgunaan Wewenang / Jabatan">Penyalahgunaan Wewenang / Jabatan</option>
                                <option value="Korupsi / Kolusi / Nepotisme">Korupsi / Kolusi / Nepotisme</option>
                                <option value="Pungutan Liar (Pungli)">Pungutan Liar (Pungli)</option>
                                <option value="Perundungan (Bullying) / Kekerasan">Perundungan (Bullying) / Kekerasan</option>
                                <option value="Pelecehan Seksual">Pelecehan Seksual</option>
                                <option value="Pelanggaran Disiplin / Kode Etik">Pelanggaran Disiplin / Kode Etik</option>
                                <option value="Perusakan Fasilitas Sekolah">Perusakan Fasilitas Sekolah</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>

                        {{-- Indikasi Perbuatan Pelanggaran (Apa) --}}
                        <div>
                            <input type="text" 
                                   name="indikasi_apa" 
                                   placeholder="Indikasi Perbuatan Pelanggaran yang diketahui (Apa) *" 
                                   required 
                                   class="w-full px-3.5 py-2.5 text-sm text-gray-700 bg-white border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-blue-400 placeholder-gray-400">
                        </div>

                        {{-- Lokasi Kejadian (Dimana) --}}
                        <div>
                            <input type="text" 
                                   name="lokasi_kejadian" 
                                   placeholder="Lokasi Kejadian (Dimana) *" 
                                   required 
                                   class="w-full px-3.5 py-2.5 text-sm text-gray-700 bg-white border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-blue-400 placeholder-gray-400">
                        </div>

                        {{-- Waktu Kejadian (Kapan) --}}
                        <div>
                            <label class="block text-sm text-gray-800 mb-1 font-normal">Waktu Kejadian (Kapan) * :</label>
                            <input type="date" 
                                   name="waktu_kejadian" 
                                   required 
                                   class="w-full px-3.5 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-blue-400">
                        </div>

                        {{-- Nama Terlapor --}}
                        <div>
                            <input type="text" 
                                   name="nama_terlapor" 
                                   placeholder="Nama Terlapor *" 
                                   required 
                                   class="w-full px-3.5 py-2.5 text-sm text-gray-700 bg-white border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-blue-400 placeholder-gray-400">
                        </div>

                        {{-- Kronologis Kejadian (Bagaimana) --}}
                        <div>
                            <textarea name="kronologis" 
                                      rows="6" 
                                      placeholder="Kronologis Kejadian (Bagaimana) *" 
                                      required 
                                      class="w-full px-3.5 py-2.5 text-sm text-gray-700 bg-white border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-blue-400 placeholder-gray-400 resize-y"></textarea>
                        </div>

                        {{-- Unggah Bukti --}}
                        <div>
                            <label class="block text-sm text-gray-800 mb-1 font-normal">Unggah bukti</label>
                            <div class="border border-gray-300 rounded bg-white p-1">
                                <input type="file" 
                                       name="bukti[]" 
                                       id="bukti_file" 
                                       multiple 
                                       accept=".jpg,.jpeg,.png,.pdf,.mp4,.zip,.rar"
                                       class="block w-full text-xs text-gray-600 file:mr-3 file:py-1 file:px-3 file:rounded file:border file:border-gray-300 file:text-xs file:font-normal file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200 cursor-pointer focus:outline-none">
                            </div>
                            <p class="text-[11px] leading-tight text-gray-500 mt-1 italic">
                                *) File yang diperbolehkan berupa pdf, foto, audio, atau video (dapat berupa satu berkas dalam bentuk *.zip atau *.rar). Maksimal ukuran 50 MB.
                            </p>
                        </div>

                        {{-- CAPTCHA --}}
                        <div class="space-y-1.5 pt-1">
                            <div class="flex items-center space-x-2">
                                <canvas x-ref="captchaCanvas" 
                                        width="130" 
                                        height="38" 
                                        @click="generateCaptcha()" 
                                        class="border border-gray-300 rounded bg-gray-100 cursor-pointer shadow-inner" 
                                        title="Klik untuk ganti kode"></canvas>
                                <button type="button" @click="generateCaptcha()" class="text-xs text-blue-600 hover:underline">
                                    ↻ Ganti kode
                                </button>
                            </div>
                            <input type="text" 
                                   x-model="captchaInput" 
                                   required 
                                   placeholder="" 
                                   class="w-full px-3.5 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-blue-400 uppercase">
                            <p x-show="captchaError" class="text-xs text-red-600 font-medium">Kode CAPTCHA tidak sesuai, silakan coba lagi.</p>
                        </div>

                        {{-- Tombol Kirim --}}
                        <div class="pt-2">
                            <button type="submit" 
                                    class="w-full bg-blue-800 hover:bg-blue-900 active:bg-blue-950 text-white font-bold py-2.5 px-4 rounded shadow-sm transition-colors text-sm tracking-wider uppercase">
                                KIRIM
                            </button>
                        </div>

                    </div>
                </div>

                {{-- ==================== POP-UP KONFIRMASI ==================== --}}
                <div x-show="showConfirmModal" 
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4"
                     style="display: none;">
                    
                    <div class="bg-white rounded-lg shadow-2xl max-w-md w-full p-6">
                        <div class="flex items-center mb-4">
                            <svg class="h-8 w-8 text-blue-800 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                            <h3 class="text-lg font-bold text-gray-900">Konfirmasi Pengaduan</h3>
                        </div>
                        
                        <p class="text-sm text-gray-700 mb-6">
                            Apakah Anda yakin data laporan yang diisi sudah benar? 
                            <span class="block mt-2 font-semibold text-red-600">Laporan palsu atau fitnah dapat dikenakan sanksi tata tertib dan ketentuan hukum yang berlaku.</span>
                        </p>
                        
                        <div class="flex justify-end space-x-3">
                            <button type="button" 
                                    @click="showConfirmModal = false"
                                    class="px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium rounded hover:bg-gray-300 transition">
                                Batal
                            </button>
                            <button type="button" 
                                    @click="confirmSubmit()"
                                    class="px-4 py-2 bg-blue-800 text-white text-sm font-bold rounded hover:bg-blue-900 transition">
                                Ya, Kirim Laporan
                            </button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </section>

    {{-- ==================== SECTION CEK STATUS ==================== --}}
    <section id="cek-status" class="py-20 bg-white" x-data="{
        trackingCode: '',
        loading: false,
        result: null,
        error: '',
        checkStatus() {
            if (!this.trackingCode.trim()) return;
            this.loading = true;
            this.result = null;
            this.error = '';
            
            fetch('{{ route('report.check.post') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    tracking_code: this.trackingCode.trim()
                })
            })
            .then(res => res.json())
            .then(data => {
                this.loading = false;
                this.result = data;
            })
            .catch(err => {
                this.loading = false;
                this.error = 'Terjadi kesalahan sistem. Silakan coba beberapa saat lagi.';
            });
        }
    }">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            {{-- Header --}}
            <div class="mb-8">
                <h2 class="text-3xl md:text-4xl font-extrabold text-[#1e293b] tracking-normal mb-1">CEK STATUS</h2>
                <p class="text-sm text-gray-500 italic">Monitor pelaporan Anda di sini.</p>
            </div>

            {{-- Form Input --}}
            <form @submit.prevent="checkStatus()" class="max-w-md mx-auto">
                <div>
                    <input type="text" 
                           x-model="trackingCode" 
                           placeholder="Nomor Register *" 
                           required 
                           class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-blue-400 placeholder-gray-400">
                </div>

                <div class="mt-4 flex justify-center">
                    <button type="submit" 
                            :disabled="loading"
                            class="bg-blue-800 hover:bg-blue-900 active:bg-blue-950 text-white font-bold py-2 px-10 rounded shadow-sm transition-colors text-sm uppercase tracking-wider disabled:opacity-50">
                        <span x-show="!loading">CEK</span>
                        <span x-show="loading">MEMERIKSA...</span>
                    </button>
                </div>
            </form>

            {{-- Error Connection --}}
            <div x-show="error" class="mt-6 max-w-md mx-auto text-sm text-red-600 bg-red-50 p-3 rounded border border-red-200">
                <p x-text="error"></p>
            </div>

            {{-- Hasil Pencarian Status --}}
            <div x-show="result" x-transition class="mt-8 max-w-lg mx-auto bg-gray-50 border border-gray-200 rounded-lg p-6 text-left shadow-sm">
                <template x-if="result && result.found">
                    <div>
                        <div class="flex justify-between items-center mb-4 pb-3 border-b border-gray-200">
                            <div>
                                <span class="text-xs text-gray-500 uppercase tracking-wide">Nomor Register</span>
                                <h4 class="text-lg font-mono font-bold text-blue-900" x-text="result.report.tracking_code"></h4>
                            </div>
                            <span class="px-3.5 py-1 rounded-full text-xs font-bold"
                                  :class="{
                                      'bg-yellow-100 text-yellow-800 border border-yellow-200': result.report.status === 'Baru',
                                      'bg-blue-100 text-blue-800 border border-blue-200': result.report.status === 'Diverifikasi',
                                      'bg-purple-100 text-purple-800 border border-purple-200': result.report.status === 'Diproses',
                                      'bg-green-100 text-green-800 border border-green-200': result.report.status === 'Selesai'
                                  }"
                                  x-text="result.report.status"></span>
                        </div>

                        <div class="space-y-2 text-sm">
                            <p class="text-gray-600"><strong class="text-gray-800">Kategori:</strong> <span x-text="result.report.jenis_pelanggaran"></span></p>
                            <p class="text-gray-600"><strong class="text-gray-800">Waktu Lapor:</strong> <span x-text="result.report.tanggal"></span></p>
                            
                            <div class="mt-4 bg-white p-3.5 rounded border border-gray-200">
                                <p class="text-xs font-semibold text-gray-700 mb-1">Catatan dari Petugas WBS:</p>
                                <p class="text-xs text-gray-600" x-text="result.report.catatan_admin || 'Belum ada catatan dari petugas.'"></p>
                            </div>
                        </div>
                    </div>
                </template>

                <template x-if="result && !result.found">
                    <div class="text-center py-2 text-red-600 text-sm">
                        <p class="font-medium" x-text="result.message"></p>
                    </div>
                </template>
            </div>
        </div>
    </section>

    {{-- ==================== SECTION FAQ ==================== --}}
    <section id="faq" class="py-20 bg-gray-50/50" x-data="{ activeFaq: 1 }">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Header --}}
            <div class="text-center mb-10">
                <h2 class="text-3xl md:text-4xl font-extrabold text-[#1e293b] tracking-normal mb-1">FREQUENTLY ASKED QUESTION</h2>
                <p class="text-sm text-gray-500 italic">Pelajari lebih lanjut mengenai Whistleblowing System.</p>
            </div>

            {{-- Accordion Container --}}
            <div class="max-w-3xl mx-auto border border-gray-200 rounded overflow-hidden shadow-sm bg-white divide-y divide-gray-200">
                
                {{-- FAQ Item 1 (Sesuai Screenshot) --}}
                <div>
                    <button type="button" 
                            @click="activeFaq = (activeFaq === 1 ? null : 1)" 
                            class="w-full text-left px-5 py-3.5 bg-gray-50 hover:bg-gray-100 flex justify-between items-center transition-colors">
                        <span class="text-sm text-gray-800 font-normal">Apa saja syarat laporan dapat ditindaklanjuti ?</span>
                        <svg class="w-4 h-4 text-gray-500 transform transition-transform duration-200" :class="activeFaq === 1 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="activeFaq === 1" x-collapse class="px-5 py-3.5 bg-white text-sm text-gray-600 border-t border-gray-200 leading-relaxed">
                        Mengisi email dan nomor HP yang dapat dihubungi serta melengkapi form pelaporan.
                    </div>
                </div>

                {{-- FAQ Item 2 --}}
                <div>
                    <button type="button" 
                            @click="activeFaq = (activeFaq === 2 ? null : 2)" 
                            class="w-full text-left px-5 py-3.5 bg-gray-50 hover:bg-gray-100 flex justify-between items-center transition-colors">
                        <span class="text-sm text-gray-800 font-normal">Apakah identitas pelapor dijamin kerahasiaannya ?</span>
                        <svg class="w-4 h-4 text-gray-500 transform transition-transform duration-200" :class="activeFaq === 2 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="activeFaq === 2" x-collapse class="px-5 py-3.5 bg-white text-sm text-gray-600 border-t border-gray-200 leading-relaxed">
                        Ya, identitas pelapor dijamin kerahasiaannya dan dilindungi oleh pihak sekolah SMKN 4 Bandung serta peraturan hukum yang berlaku. Anda juga dapat memilih opsi anonim saat melapor.
                    </div>
                </div>

                {{-- FAQ Item 3 --}}
                <div>
                    <button type="button" 
                            @click="activeFaq = (activeFaq === 3 ? null : 3)" 
                            class="w-full text-left px-5 py-3.5 bg-gray-50 hover:bg-gray-100 flex justify-between items-center transition-colors">
                        <span class="text-sm text-gray-800 font-normal">Bagaimana cara memantau tindak lanjut pengaduan saya ?</span>
                        <svg class="w-4 h-4 text-gray-500 transform transition-transform duration-200" :class="activeFaq === 3 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="activeFaq === 3" x-collapse class="px-5 py-3.5 bg-white text-sm text-gray-600 border-t border-gray-200 leading-relaxed">
                        Anda dapat memeriksa perkembangan laporan melalui menu "Cek Status" di atas dengan memasukkan Nomor Register / Kode Tracking yang Anda terima saat selesai mengirim laporan.
                    </div>
                </div>

                {{-- FAQ Item 4 --}}
                <div>
                    <button type="button" 
                            @click="activeFaq = (activeFaq === 4 ? null : 4)" 
                            class="w-full text-left px-5 py-3.5 bg-gray-50 hover:bg-gray-100 flex justify-between items-center transition-colors">
                        <span class="text-sm text-gray-800 font-normal">Berapa lama laporan saya akan diproses ?</span>
                        <svg class="w-4 h-4 text-gray-500 transform transition-transform duration-200" :class="activeFaq === 4 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="activeFaq === 4" x-collapse class="px-5 py-3.5 bg-white text-sm text-gray-600 border-t border-gray-200 leading-relaxed">
                        Laporan yang masuk akan diverifikasi awal dalam waktu maksimal 3x24 jam kerja sebelum ditindaklanjuti ke tahap investigasi oleh tim penanganan resmi.
                    </div>
                </div>

                {{-- FAQ Item 5 --}}
                <div>
                    <button type="button" 
                            @click="activeFaq = (activeFaq === 5 ? null : 5)" 
                            class="w-full text-left px-5 py-3.5 bg-gray-50 hover:bg-gray-100 flex justify-between items-center transition-colors">
                        <span class="text-sm text-gray-800 font-normal">Apakah ada biaya untuk membuat pengaduan ?</span>
                        <svg class="w-4 h-4 text-gray-500 transform transition-transform duration-200" :class="activeFaq === 5 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="activeFaq === 5" x-collapse class="px-5 py-3.5 bg-white text-sm text-gray-600 border-t border-gray-200 leading-relaxed">
                        Tidak ada biaya apapun. Semua layanan Whistleblowing System (WBS) SMKN 4 Bandung sepenuhnya gratis.
                    </div>
                </div>

            </div>
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

    <script>
    function buatPengaduanForm() {
        return {
            captchaCode: '',
            captchaInput: '',
            captchaError: false,
            showConfirmModal: false,
            init() {
                this.generateCaptcha();
            },
            generateCaptcha() {
                const chars = '23456789ABCDEFGHJKLMNPQRSTUVWXYZ';
                let code = '';
                for (let i = 0; i < 4; i++) {
                    code += chars.charAt(Math.floor(Math.random() * chars.length));
                }
                this.captchaCode = code;
                this.captchaInput = '';
                this.captchaError = false;
                this.$nextTick(() => this.drawCaptcha());
            },
            drawCaptcha() {
                const canvas = this.$refs.captchaCanvas;
                if (!canvas) return;
                const ctx = canvas.getContext('2d');
                const w = canvas.width;
                const h = canvas.height;
                
                ctx.fillStyle = '#eaecef';
                ctx.fillRect(0, 0, w, h);
                
                // Random noise lines
                for (let i = 0; i < 6; i++) {
                    ctx.strokeStyle = ['#9ca3af', '#6b7280', '#4b5563', '#374151'][Math.floor(Math.random() * 4)];
                    ctx.lineWidth = Math.random() * 1.5 + 0.8;
                    ctx.beginPath();
                    ctx.moveTo(Math.random() * w, Math.random() * h);
                    ctx.bezierCurveTo(Math.random() * w, Math.random() * h, Math.random() * w, Math.random() * h, Math.random() * w, Math.random() * h);
                    ctx.stroke();
                }
                
                // Dots noise
                for (let i = 0; i < 45; i++) {
                    ctx.fillStyle = '#4b5563';
                    ctx.beginPath();
                    ctx.arc(Math.random() * w, Math.random() * h, Math.random() * 1.2, 0, Math.PI * 2);
                    ctx.fill();
                }
                
                // Text characters with slight distortion
                ctx.font = 'bold 22px monospace';
                ctx.textBaseline = 'middle';
                const charSpacing = (w - 20) / 4;
                for (let i = 0; i < this.captchaCode.length; i++) {
                    ctx.save();
                    ctx.fillStyle = '#111827';
                    const x = 12 + i * charSpacing;
                    const y = h / 2 + (Math.random() - 0.5) * 5;
                    ctx.translate(x, y);
                    ctx.rotate((Math.random() - 0.5) * 0.35);
                    ctx.fillText(this.captchaCode[i], 0, 0);
                    ctx.restore();
                }
            },
            validateAndSubmit() {
                if (this.captchaInput.trim().toUpperCase() !== this.captchaCode) {
                    this.captchaError = true;
                    return;
                }
                this.captchaError = false;
                this.showConfirmModal = true;
            },
            confirmSubmit() {
                this.showConfirmModal = false;
                document.getElementById('wbs-form').submit();
            }
        };
    }
    </script>

</body>
</html>