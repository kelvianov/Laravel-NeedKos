<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Press Kit - KosKu</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: #000000;
            background: #fff;
            zoom:0.9;
        }

        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
        }

        /* Hero Section */
        .hero {
            padding-top: 100px;
            background: linear-gradient(to bottom right, #222, #000000);
            color: #fff;
            text-align: center;
            padding-bottom: 80px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 24px;
            line-height: 1.2;
        }

        .hero p {
            font-size: 1.2rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Company Overview Section */
        .section {
            padding: 80px 0;
            border-bottom: 1px solid #eee;
        }

        .section-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 48px;
            text-align: center;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 32px;
            margin-bottom: 48px;
        }

        .stat-card {
            text-align: center;
            padding: 32px;
            background: #f8f9fa;
            border-radius: 16px;
            border: 1px solid #eee;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: #222;
            margin-bottom: 8px;
        }

        .stat-label {
            font-size: 1rem;
            color: #666;
        }

        /* Brand Assets */
        .brand-assets {
            background: #f8f9fa;
        }

        .assets-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 32px;
        }

        .asset-card {
            background: #fff;
            padding: 32px;
            border-radius: 16px;
            border: 1px solid #eee;
        }

        .asset-preview {
            width: 100%;
            height: 200px;
            background: #eee;
            margin-bottom: 24px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .asset-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .asset-desc {
            color: #666;
            margin-bottom: 20px;
        }

        .download-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            background: #222;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .download-btn:hover {
            background: #000;
        }

        /* Media Contact */
        .contact-info {
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
        }

        .contact-email {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 16px;
        }

        .contact-desc {
            color: #666;
            margin-bottom: 32px;
        }

        .social-links {
            display: flex;
            gap: 16px;
            justify-content: center;
        }

        .social-link {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: #222;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.2s;
        }

        .social-link:hover {
            background: #000;
            transform: translateY(-2px);
        }

        /* Latest News */
        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 32px;
        }

        .news-card {
            background: #fff;
            border: 1px solid #eee;
            border-radius: 16px;
            overflow: hidden;
        }

        .news-image {
            width: 100%;
            height: 200px;
            background: #eee;
            object-fit: cover;
        }

        .news-content {
            padding: 24px;
        }

        .news-date {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 8px;
        }

        .news-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 12px;
            color: #222;
        }

        .news-excerpt {
            color: #666;
            margin-bottom: 20px;
        }

        .read-more {
            color: #222;
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .read-more:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }

            .section {
                padding: 60px 0;
            }

            .section-title {
                font-size: 1.8rem;
                margin-bottom: 36px;
            }

            .contact-email {
                font-size: 1.2rem;
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
    <section class="hero">
        <div class="container">            <h1>Press Kit KosKu</h1>
            <p>Semua yang perlu Anda ketahui tentang KosKu untuk liputan media dan kerjasama brand</p>
        </div>
    </section>

    <!-- Company Overview -->
    <section class="section">
        <div class="container">            <h2 class="section-title">Sekilas Perusahaan</h2>
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">500,000+</div>
                    <div class="stat-label">Properti Terdaftar</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">1M+</div>
                    <div class="stat-label">Pengguna Aktif Bulanan</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">25+</div>
                    <div class="stat-label">Kota Tersedia</div>
                </div>
            </div>
            <div class="contact-info">
                <p>KosKu adalah platform terdepan di Indonesia untuk mencari dan memesan akomodasi berkualitas. Kami menghubungkan pemilik properti dengan calon penyewa, membuat proses pencarian kos menjadi lebih mudah dan efisien.</p>
            </div>
        </div>
    </section>

    <!-- Brand Assets -->
    <section class="section brand-assets">
        <div class="container">            <h2 class="section-title">Aset Brand</h2>
            <div class="assets-grid">                <div class="asset-card">
                    <div class="asset-preview">
                        <img src="https://images.unsplash.com/photo-1599305445671-ac291c95aaa9?auto=format&fit=crop&q=80" alt="Logo KosKu" style="width: 100%; height: 100%; object-fit: contain;">
                    </div>
                    <h3 class="asset-title">Paket Logo</h3>
                    <p class="asset-desc">Unduh logo kami dalam berbagai format dan ukuran</p>
                    <a href="#" class="download-btn">
                        <i class="fas fa-download"></i>
                        Unduh
                    </a>
                </div>
                <div class="asset-card">
                    <div class="asset-preview">
                        <img src="https://images.unsplash.com/photo-1536924940846-227afb31e2a5?auto=format&fit=crop&q=80" alt="Panduan Brand" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <h3 class="asset-title">Panduan Brand</h3>
                    <p class="asset-desc">Identitas brand dan panduan penggunaan</p>
                    <a href="#" class="download-btn">
                        <i class="fas fa-download"></i>
                        Unduh
                    </a>
                </div>
                <div class="asset-card">
                    <div class="asset-preview">
                        <img src="https://images.unsplash.com/photo-1497366811353-6870744d04b2?auto=format&fit=crop&q=80" alt="Media Kit" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <h3 class="asset-title">Media Kit</h3>
                    <p class="asset-desc">Foto resolusi tinggi untuk kebutuhan media</p>
                    <a href="#" class="download-btn">
                        <i class="fas fa-download"></i>
                        Unduh
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Media Contact -->
    <section class="section">
        <div class="container">            <h2 class="section-title">Kontak Media</h2>
            <div class="contact-info">
                <div class="contact-email">press@kosku.com</div>
                <p class="contact-desc">Untuk keperluan media, silakan hubungi kami melalui email atau media sosial kami</p>
                <div class="social-links">
                    <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest News -->
    <section class="section">
        <div class="container">            <h2 class="section-title">Berita Terbaru</h2>
            <div class="news-grid">                <div class="news-card">
                    <div class="news-image" style="background-image: url('https://images.unsplash.com/photo-1480714378408-67cf0d13bc1b?auto=format&fit=crop&q=80'); background-size: cover; background-position: center;"></div>
                    <div class="news-content">
                        <div class="news-date">1 Juni 2025</div>
                        <h3 class="news-title">KosKu Ekspansi ke 5 Kota Baru</h3>
                        <p class="news-excerpt">Kami dengan gembira mengumumkan ekspansi ke lima kota besar baru di Indonesia...</p>
                        <a href="#" class="read-more">
                            Baca selengkapnya
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="news-card">
                    <div class="news-image" style="background-image: url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80'); background-size: cover; background-position: center;"></div>
                    <div class="news-content">
                        <div class="news-date">28 Mei 2025</div>
                        <h3 class="news-title">Fitur Baru untuk Pemilik Properti</h3>
                        <p class="news-excerpt">Memperkenalkan tools dan fitur baru untuk membantu pemilik properti mengelola listing mereka dengan lebih efektif...</p>
                        <a href="#" class="read-more">
                            Baca selengkapnya
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="news-card">
                    <div class="news-image" style="background-image: url('https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&q=80'); background-size: cover; background-position: center;"></div>
                    <div class="news-content">
                        <div class="news-date">15 Mei 2025</div>
                        <h3 class="news-title">KosKu Raih Penghargaan Inovasi Teknologi</h3>
                        <p class="news-excerpt">Kami merasa terhormat telah diakui atas kontribusi kami dalam sektor teknologi properti...</p>
                        <a href="#" class="read-more">
                            Baca selengkapnya
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        @include('components.footer')
    </footer>
</body>
</html>