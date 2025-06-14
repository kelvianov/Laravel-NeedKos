<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kebijakan Privasi - KosKu</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 
    
    

    <script src="https://cdn.tailwindcss.com"></script>
      <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');        /* Button search navbar bentuk oval/lonjong */
        .nav-search-btn {
            border-radius: 24px !important;
            padding: 4px 14px !important;
            min-width: 42px !important;
            height: 30px !important;
            width: auto !important;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            padding-top: 80px;
            zoom: 0.9;        }

        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .hover-lift {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .hover-lift:hover {
            transform: translateY(-4px);
        }

        .section-card {
            background: rgba(255, 255, 255, 0.98);
            border: 1px solid rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .section-card:hover {
            border-color: rgba(0, 0, 0, 0.2);
        }

        .bullet-list li {
            position: relative;
            padding-left: 1.5rem;
            margin-bottom: 0.75rem;
        }

        .bullet-list li::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0.5rem;
            width: 6px;
            height: 6px;
            background: #000;
            border-radius: 50%;
        }
    </style>
</head>
<body class="bg-gray-50">
    @include('components.navbar')

    <!-- Hero Section -->
    <section class="bg-black text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl sm:text-5xl font-bold mb-6">Kebijakan Privasi</h1>
                <p class="text-lg text-gray-300 mb-8">
                    Kami berkomitmen untuk melindungi privasi Anda. Pelajari bagaimana kami mengelola informasi Anda.
                </p>
                <div class="inline-flex items-center px-4 py-2 rounded-md bg-white/10 backdrop-blur-sm">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="text-sm">Terakhir diperbarui: 2 Juni 2025</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="max-w-4xl mx-auto px-4 py-16">
        <!-- Introduction -->
        <div class="section-card rounded-xl p-8 mb-12 shadow-sm">
            <h2 class="text-2xl font-bold mb-6">Tentang Kebijakan Privasi Ini</h2>
            <p class="text-gray-600 leading-relaxed mb-6">
                Kebijakan ini menjelaskan bagaimana KosKu mengumpulkan, menggunakan, dan melindungi informasi pribadi Anda saat menggunakan platform kami untuk mencari dan menyewa kos. Kami memahami pentingnya privasi Anda dan berkomitmen untuk melindungi data Anda.
            </p>
        </div>

        <!-- Information Collection -->
        <section class="section-card rounded-xl p-8 mb-8 shadow-sm">
            <h3 class="text-xl font-bold mb-6">Informasi yang Kami Kumpulkan</h3>
            <ul class="bullet-list text-gray-600">
                <li>Informasi Pribadi: nama lengkap, alamat email, nomor telepon</li>
                <li>Informasi Akun: username, kata sandi (terenkripsi)</li>
                <li>Data Transaksi: riwayat pemesanan dan pembayaran</li>
                <li>Data Penggunaan: preferensi pencarian, interaksi dengan platform</li>
            </ul>
        </section>

        <!-- Data Usage -->
        <section class="section-card rounded-xl p-8 mb-8 shadow-sm">
            <h3 class="text-xl font-bold mb-6">Penggunaan Data</h3>
            <ul class="bullet-list text-gray-600">
                <li>Memfasilitasi proses pencarian dan pemesanan kos</li>
                <li>Memproses transaksi dan pembayaran dengan aman</li>
                <li>Mengirimkan informasi penting terkait layanan</li>
                <li>Meningkatkan pengalaman pengguna platform</li>
                <li>Mencegah penyalahgunaan dan aktivitas ilegal</li>
            </ul>
        </section>

        <!-- Data Protection -->
        <section class="section-card rounded-xl p-8 mb-8 shadow-sm">
            <h3 class="text-xl font-bold mb-6">Perlindungan Data</h3>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="p-6 bg-gray-50 rounded-lg">
                    <div class="w-12 h-12 bg-black rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <h4 class="font-semibold mb-2">Enkripsi Data</h4>
                    <p class="text-sm text-gray-600">Enkripsi end-to-end untuk data sensitif</p>
                </div>

                <div class="p-6 bg-gray-50 rounded-lg">
                    <div class="w-12 h-12 bg-black rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h4 class="font-semibold mb-2">Akses Terbatas</h4>
                    <p class="text-sm text-gray-600">Kontrol akses ketat untuk data pengguna</p>
                </div>

                <div class="p-6 bg-gray-50 rounded-lg">
                    <div class="w-12 h-12 bg-black rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <h4 class="font-semibold mb-2">Monitoring 24/7</h4>
                    <p class="text-sm text-gray-600">Pemantauan keamanan real-time</p>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="section-card rounded-xl p-8 text-center">
            <h3 class="text-xl font-bold mb-6">Butuh Bantuan?</h3>
            <p class="text-gray-600 mb-8 max-w-2xl mx-auto">
                Jika Anda memiliki pertanyaan tentang kebijakan privasi kami atau ingin menggunakan hak-hak Anda,
                tim dukungan kami siap membantu.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('help.center') }}" class="inline-flex items-center justify-center px-6 py-3 bg-black text-white rounded-lg hover:bg-gray-800 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    Pusat Bantuan
                </a>
                <a href="mailto:privacy@kosku.com" class="inline-flex items-center justify-center px-6 py-3 border-2 border-gray-300 text-gray-700 rounded-lg hover:border-gray-400 hover:bg-gray-50 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    Email Kami
                </a>
            </div>
        </section>
    </main>

    <!-- Footer Wrapper -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @include('components.footer')
    </div>
</body>
</html>