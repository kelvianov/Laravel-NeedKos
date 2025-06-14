<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Safety Guide - KosKu</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f8f9fa;
            zoom: 0.9;
        }

        .safety-hero {
            background: linear-gradient(135deg, #1a1a1a 0%, #000000 100%);
            color: white;
            padding: 120px 0 80px;
            text-align: center;
        }

        .safety-hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            background: linear-gradient(45deg, #fff, #f0f0f0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .safety-hero p {
            font-size: 1.2rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .safety-content {
            padding: 80px 0;
        }

        .safety-section {
            background: white;
            border-radius: 16px;
            padding: 40px;
            margin-bottom: 40px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid #e1e5e9;
        }

        .safety-section h2 {
            color: #1a1a1a;
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .safety-section h2 i {
            color: #1a1a1a;
            font-size: 1.5rem;
        }

        .safety-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 24px;
            margin-top: 32px;
        }

        .safety-card {
            background: #f8f9fa;
            border: 2px solid #1a1a1a;
            border-radius: 12px;
            padding: 24px;
            transition: all 0.3s ease;
        }

        .safety-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(26, 26, 26, 0.15);
        }

        .safety-card h3 {
            color: #1a1a1a;
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .safety-card h3 i {
            color: #1a1a1a;
        }

        .safety-card p {
            color: #555;
            line-height: 1.6;
        }

        .safety-card ul {
            list-style: none;
            margin-top: 16px;
        }

        .safety-card ul li {
            color: #555;
            margin-bottom: 8px;
            padding-left: 20px;
            position: relative;
        }

        .safety-card ul li:before {
            content: "✓";
            position: absolute;
            left: 0;
            color: #1a1a1a;
            font-weight: bold;
        }

        .emergency-section {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
            color: white;
            border: none;
        }

        .emergency-section h2 {
            color: white;
        }

        .emergency-section h2 i {
            color: #ff4757;
        }

        .emergency-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 32px;
        }

        .emergency-card {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            padding: 24px;
            text-align: center;
            backdrop-filter: blur(10px);
        }

        .emergency-card h3 {
            color: white;
            font-size: 1.1rem;
            margin-bottom: 8px;
        }

        .emergency-card .number {
            color: #ff4757;
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .emergency-card p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
        }

        .tips-list {
            background: #1a1a1a;
            color: white;
            border-radius: 12px;
            padding: 32px;
            margin-top: 32px;
        }

        .tips-list h3 {
            color: white;
            font-size: 1.5rem;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .tips-list ul {
            list-style: none;
        }

        .tips-list ul li {
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 12px;
            padding-left: 24px;
            position: relative;
        }

        .tips-list ul li:before {
            content: "→";
            position: absolute;
            left: 0;
            color: white;
            font-weight: bold;
        }

        .warning-box {
            background: linear-gradient(135deg, #ff4757, #ff3838);
            color: white;
            border-radius: 12px;
            padding: 24px;
            margin: 32px 0;
            text-align: center;
        }

        .warning-box h3 {
            font-size: 1.3rem;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .cta-section {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
            color: white;
            padding: 80px 0;
            text-align: center;
        }

        .cta-section h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .cta-section p {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 32px;
        }

        .cta-btn {
            display: inline-block;
            background: white;
            color: #1a1a1a;
            padding: 16px 32px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            margin: 0 8px;
        }

        .cta-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 255, 255, 0.2);
        }

        @media (max-width: 768px) {
            .safety-hero h1 {
                font-size: 2rem;
            }

            .safety-section {
                padding: 24px;
                margin-bottom: 24px;
            }

            .safety-section h2 {
                font-size: 1.5rem;
            }

            .safety-grid {
                grid-template-columns: 1fr;
            }

            .emergency-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        @include('components.navbar')
    </header>

    <!-- Hero Section -->
    <section class="safety-hero">
        <div class="container">
            <h1>Panduan Keamanan Kos</h1>
            <p>Keamanan Anda adalah prioritas kami. Pelajari tips dan panduan penting untuk pengalaman tinggal di kos yang aman dan nyaman.</p>
        </div>
    </section>

    <!-- Safety Content -->
    <section class="safety-content">
        <div class="container">
            
            <!-- Personal Safety -->
            <div class="safety-section">
                <h2><i class="fas fa-user-shield"></i>Keamanan Pribadi di Kos</h2>
                <p>Melindungi diri dan barang-barang pribadi sangat penting saat tinggal di kos bersama.</p>
                
                <div class="safety-grid">
                    <div class="safety-card">
                        <h3><i class="fas fa-key"></i>Keamanan Kamar</h3>
                        <p>Selalu amankan kamar dan barang pribadi Anda.</p>
                        <ul>
                            <li>Kunci kamar saat keluar</li>
                            <li>Simpan barang berharga di tempat aman</li>
                            <li>Jangan berikan kunci kamar pada orang asing</li>
                            <li>Laporkan kerusakan kunci segera</li>
                            <li>Gunakan gembok tambahan jika perlu</li>
                        </ul>
                    </div>
                    
                    <div class="safety-card">
                        <h3><i class="fas fa-users"></i>Keamanan Sosial</h3>
                        <p>Bangun hubungan positif sambil menjaga batasan pribadi.</p>
                        <ul>
                            <li>Kenali penghuni kos lainnya</li>
                            <li>Hormati privasi orang lain</li>
                            <li>Laporkan perilaku mencurigakan</li>
                            <li>Percaya pada insting Anda</li>
                            <li>Jaga informasi pribadi</li>
                        </ul>
                    </div>
                    
                    <div class="safety-card">
                        <h3><i class="fas fa-mobile-alt"></i>Komunikasi</h3>
                        <p>Tetap terhubung dan beri tahu kontak terpercaya.</p>
                        <ul>
                            <li>Beritahu alamat kos pada keluarga</li>
                            <li>Simpan kontak darurat</li>
                            <li>Jaga komunikasi rutin dengan keluarga</li>
                            <li>Miliki metode komunikasi cadangan</li>
                            <li>Simpan nomor pemilik kos</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Fire Safety -->
            <div class="safety-section">
                <h2><i class="fas fa-fire-extinguisher"></i>Keamanan dari Kebakaran</h2>
                <p>Pencegahan kebakaran dan tanggap darurat dapat menyelamatkan nyawa. Ketahui langkah-langkah keamanan ini.</p>
                
                <div class="safety-grid">
                    <div class="safety-card">
                        <h3><i class="fas fa-route"></i>Jalur Darurat</h3>
                        <p>Ketahui jalan keluar saat keadaan darurat.</p>
                        <ul>
                            <li>Cari tahu semua pintu darurat</li>
                            <li>Hafalkan rute evakuasi</li>
                            <li>Jaga agar jalur keluar bebas halangan</li>
                            <li>Ketahui titik kumpul darurat</li>
                            <li>Pastikan penerangan darurat berfungsi</li>
                        </ul>
                    </div>
                    
                    <div class="safety-card">
                        <h3><i class="fas fa-ban"></i>Pencegahan Kebakaran</h3>
                        <p>Cegah kebakaran sebelum terjadi.</p>
                        <ul>
                            <li>Jangan overload stop kontak</li>
                            <li>Jaga kebersihan area dapur</li>
                            <li>Simpan benda mudah terbakar dengan aman</li>
                            <li>Laporkan masalah listrik</li>
                            <li>Matikan peralatan elektronik setelah digunakan</li>
                        </ul>
                    </div>
                    
                    <div class="safety-card">
                        <h3><i class="fas fa-bell"></i>Peralatan Keamanan</h3>
                        <p>Kenali peralatan keamanan di kos.</p>
                        <ul>
                            <li>Ketahui lokasi pemadam kebakaran</li>
                            <li>Tes alarm asap setiap bulan</li>
                            <li>Pelajari cara menggunakan selimut api</li>
                            <li>Laporkan peralatan yang rusak</li>
                            <li>Simpan nomor pemadam kebakaran</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Health & Hygiene -->
            <div class="safety-section">
                <h2><i class="fas fa-heartbeat"></i>Kesehatan & Kebersihan</h2>
                <p>Jaga kesehatan dan kebersihan yang baik saat tinggal di kos bersama.</p>
                
                <div class="safety-grid">
                    <div class="safety-card">
                        <h3><i class="fas fa-soap"></i>Kebersihan Pribadi</h3>
                        <p>Jaga kebersihan diri dan area bersama.</p>
                        <ul>
                            <li>Cuci tangan secara teratur</li>
                            <li>Bersihkan setelah menggunakan fasilitas</li>
                            <li>Gunakan perlengkapan mandi pribadi</li>
                            <li>Jaga ventilasi yang baik</li>
                            <li>Buang sampah pada tempatnya</li>
                        </ul>
                    </div>
                    
                    <div class="safety-card">
                        <h3><i class="fas fa-utensils"></i>Keamanan Makanan</h3>
                        <p>Praktikkan penanganan dan penyimpanan makanan yang aman.</p>
                        <ul>
                            <li>Simpan makanan dengan benar</li>
                            <li>Bersihkan area dapur setelah memasak</li>
                            <li>Periksa tanggal kedaluwarsa</li>
                            <li>Jangan berbagi peralatan makan</li>
                            <li>Gunakan kulkas bersama dengan tertib</li>
                        </ul>
                    </div>
                    
                    <div class="safety-card">
                        <h3><i class="fas fa-first-aid"></i>Darurat Kesehatan</h3>
                        <p>Bersiap untuk keadaan darurat kesehatan.</p>
                        <ul>
                            <li>Pelajari pertolongan pertama dasar</li>
                            <li>Simpan kotak P3K</li>
                            <li>Ketahui lokasi rumah sakit terdekat</li>
                            <li>Miliki asuransi kesehatan</li>
                            <li>Simpan obat-obatan pribadi dengan aman</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Emergency Contacts -->
           <!-- Kontak Darurat -->
<div class="safety-section emergency-section">
    <h2><i class="fas fa-phone-alt"></i>Kontak Darurat</h2>
    <p>Simpan nomor-nomor penting ini dan pastikan mudah diakses setiap saat.</p>
    
    <div class="emergency-grid">
        <div class="emergency-card">
            <h3>Polisi</h3>
            <div class="number">110</div>
            <p>Untuk kejahatan, ancaman, dan keadaan darurat keamanan</p>
        </div>
        
        <div class="emergency-card">
            <h3>Pemadam Kebakaran</h3>
            <div class="number">113</div>
            <p>Untuk kebakaran dan penyelamatan darurat</p>
        </div>
        
        <div class="emergency-card">
            <h3>Ambulans / Medis</h3>
            <div class="number">118 / 119</div>
            <p>Untuk keadaan darurat medis dan permintaan ambulans</p>
        </div>
        
        <div class="emergency-card">
            <h3>Basarnas (SAR)</h3>
            <div class="number">115</div>
            <p>Untuk operasi pencarian dan penyelamatan</p>
        </div>
    </div>

    <div class="tips-list">
        <h3><i class="fas fa-lightbulb"></i>Tips Tanggap Darurat</h3>
        <ul>
            <li>Tenangkan diri dan evaluasi situasi</li>
            <li>Hubungi layanan darurat yang sesuai secepatnya</li>
            <li>Berikan informasi lokasi dan situasi dengan jelas</li>
            <li>Ikuti instruksi dari petugas dengan saksama</li>
            <li>Segera evakuasi jika diminta</li>
            <li>Jangan menutup telepon sebelum diberi izin</li>
            <li>Siapkan metode komunikasi cadangan</li>
        </ul>
    </div>
</div>

<!-- Peringatan Penting -->
<div class="warning-box">
    <h3><i class="fas fa-exclamation-triangle"></i>Peringatan Penting</h3>
    <p>Percayai insting Anda. Jika sesuatu terasa tidak aman atau mencurigakan, jangan ragu untuk mencari bantuan atau hubungi pihak berwenang. Keselamatan Anda lebih penting daripada bersikap sopan atau menghindari konfrontasi.</p>
</div>

</div>
</section>

<!-- Bagian CTA -->
<section class="cta-section">
    <div class="container">
        <h2>Punya Pertanyaan Tentang Keamanan?</h2>
        <p>Jika Anda memiliki kekhawatiran atau pertanyaan terkait keamanan, jangan ragu untuk menghubungi kami</p>
        <div class="cta-buttons">
            <a href="#" class="cta-btn">Hubungi Dukungan</a>
            <a href="{{ route('index') }}" class="cta-btn">Kembali ke Beranda</a>
        </div>
    </div>
</section>


    <!-- Footer -->
    <footer class="footer">
        @include('components.footer')
    </footer>

    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Add scroll effect to cards
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe all safety cards
        document.querySelectorAll('.safety-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(card);
        });
    </script>
</body>
</html>