<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Terms & Conditions - KosKu</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
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
            zoom:0.9;
        }

        .terms-hero {
            background: linear-gradient(135deg, #1a1a1a 0%, #000000 100%);
            color: white;
            padding: 120px 0 80px;
            text-align: center;
        }

        .terms-hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            background: linear-gradient(45deg, #fff, #f0f0f0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .terms-hero p {
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

        .terms-content {
            padding: 80px 0;
        }

        .terms-section {
            background: white;
            border-radius: 16px;
            padding: 40px;
            margin-bottom: 40px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid #e1e5e9;
        }

        .terms-section h2 {
            color: #1a1a1a;
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .terms-section h2 i {
            color: #1a1a1a;
            font-size: 1.5rem;
        }

        .terms-section ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .terms-section li {
            margin-bottom: 12px;
            padding-left: 24px;
            position: relative;
        }

        .terms-section li:before {
            content: "•";
            position: absolute;
            left: 0;
            color: #1a1a1a;
        }

        .update-info {
            text-align: center;
            color: #666;
            margin-top: 40px;
        }

        .update-info p {
            margin-bottom: 8px;
        }

        .cta-section {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
            color: white;
            padding: 80px 0;
            text-align: center;
            margin-top: 60px;
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
            .terms-hero h1 {
                font-size: 2rem;
            }

            .terms-section {
                padding: 24px;
                margin-bottom: 24px;
            }

            .terms-section h2 {
                font-size: 1.5rem;
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
    <section class="terms-hero">
        <div class="container">
            <h1>Syarat dan Ketentuan</h1>
            <p>Pelajari syarat dan ketentuan penggunaan platform KosKu untuk pengalaman yang lebih baik.</p>
        </div>
    </section>

    <!-- Terms Content -->
    <section class="terms-content">
        <div class="container">
            <div class="terms-section">
                <h2><i class="fas fa-scroll"></i>1. Ketentuan Umum</h2>
                <p>Dengan menggunakan layanan KosKu, Anda menyetujui untuk terikat dengan syarat dan ketentuan yang tercantum di bawah ini. Mohon membaca dengan seksama sebelum menggunakan platform kami.</p>
            </div>

            <div class="terms-section">
                <h2><i class="fas fa-user-circle"></i>2. Pendaftaran dan Akun</h2>
                <ul>
                    <li>Pengguna wajib memberikan informasi yang akurat dan lengkap saat mendaftar</li>
                    <li>Pengguna bertanggung jawab untuk menjaga kerahasiaan akun dan kata sandi</li>
                    <li>Satu email hanya dapat digunakan untuk satu akun</li>
                    <li>KosKu berhak menonaktifkan akun yang melanggar ketentuan</li>
                </ul>
            </div>

            <div class="terms-section">
                <h2><i class="fas fa-hand-point-right"></i>3. Penggunaan Layanan</h2>
                <ul>
                    <li>Pengguna tidak diperkenankan menggunakan layanan untuk tujuan ilegal</li>
                    <li>Informasi kos yang ditampilkan harus sesuai dengan keadaan sebenarnya</li>
                    <li>Dilarang memposting konten yang mengandung SARA atau pornografi</li>
                    <li>Pengguna wajib mematuhi peraturan yang berlaku di Indonesia</li>
                </ul>
            </div>

            <div class="terms-section">
                <h2><i class="fas fa-money-check-alt"></i>4. Pembayaran dan Transaksi</h2>
                <ul>
                    <li>Semua transaksi wajib melalui sistem KosKu</li>
                    <li>Pembatalan pemesanan mengikuti kebijakan yang berlaku</li>
                    <li>Biaya layanan tidak dapat dikembalikan</li>
                    <li>KosKu tidak bertanggung jawab atas transaksi di luar sistem</li>
                </ul>
            </div>

            <div class="terms-section">
                <h2><i class="fas fa-balance-scale"></i>5. Hak dan Tanggung Jawab</h2>
                <ul>
                    <li>KosKu berhak mengubah syarat dan ketentuan tanpa pemberitahuan</li>
                    <li>Pengguna bertanggung jawab atas segala aktivitas dalam akunnya</li>
                    <li>KosKu tidak bertanggung jawab atas kerugian yang timbul dari penggunaan layanan</li>
                    <li>Pengguna wajib melaporkan pelanggaran yang ditemukan</li>
                </ul>
            </div>

            <div class="terms-section">
                <h2><i class="fas fa-shield-alt"></i>6. Privasi dan Data</h2>
                <ul>
                    <li>KosKu akan menjaga kerahasiaan data pengguna</li>
                    <li>Data pengguna dapat digunakan untuk keperluan internal</li>
                    <li>Pengguna menyetujui penggunaan cookies</li>
                    <li>Data pengguna tidak akan dijual ke pihak ketiga</li>
                </ul>
            </div>

            <div class="update-info">
                <p>Terakhir diperbarui: 2 Juni 2025</p>
                <p>Untuk informasi lebih lanjut, silakan hubungi tim dukungan kami melalui halaman Bantuan.</p>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2>Ada Pertanyaan?</h2>
            <p>Tim dukungan kami siap membantu Anda dengan pertanyaan seputar syarat dan ketentuan</p>
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
</body>
</html>
