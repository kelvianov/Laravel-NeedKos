<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>KosKu - Temukan Kos Impian Anda</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>
<body>
    <div id="loading-screen">
        <div class="spinner"></div>
    </div>

    <!-- Header -->
    <header class="header">
        @include('components.navbar')
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-content">
            <h1 class="floating">Temukan Kos Impian Anda</h1>
            <p>Platform terpercaya untuk mencari kos-kosan berkualitas dengan harga terjangkau di seluruh Indonesia</p>
            <div class="search-box">
                <input type="text" placeholder="Cari berdasarkan lokasi, harga, atau fasilitas..." />
                <button class="search-btn">
                    <i class="fas fa-search"></i> Cari Kos
                </button>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="about">
        <div class="container">
            <h2 class="section-title fade-in">Mengapa Memilih KosKu?</h2>
            <div class="features-grid">
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h3>Pencarian Mudah</h3>
                    <p>Temukan kos sesuai kriteria Anda dengan sistem pencarian yang canggih dan filter yang lengkap</p>
                </div>
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Terpercaya & Aman</h3>
                    <p>Semua kos telah diverifikasi dan dijamin keamanannya untuk kenyamanan Anda</p>
                </div>
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <h3>Harga Transparan</h3>
                    <p>Tidak ada biaya tersembunyi. Semua harga ditampilkan dengan jelas dan transparan</p>
                </div>
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3>Support 24/7</h3>
                    <p>Tim customer service kami siap membantu Anda kapan saja selama 24 jam</p>
                </div>
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3>Aplikasi Mobile</h3>
                    <p>Akses KosKu dimana saja dan kapan saja melalui aplikasi mobile yang user-friendly</p>
                </div>
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3>Review Terpercaya</h3>
                    <p>Baca review dan rating dari penghuni sebelumnya untuk membantu keputusan Anda</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Properties Section -->
    <section class="properties" id="properties">
        <div class="container">
            <h2 class="section-title fade-in">Kos Populer</h2>
            <div class="properties-grid">
                @foreach($kos as $item)
                    <a href="{{ route('kos.show', $item->id) }}" class="property-card-link">
                        <div class="property-card fade-in">
                            <div style="background-image: url('{{ asset('storage/' . $item->image) }}'); background-size: cover; background-position: center; height: 200px; border-radius: 8px;"></div>
                            <div class="property-info">
                                <div class="property-price">Rp {{ number_format($item->price, 0, ',', '.') }}/bulan</div>
                                <div class="property-title">{{ $item->name }}</div>
                                <div class="property-location"><i class="fas fa-map-marker-alt"></i> {{ $item->address }}</div>
                                <div class="property-features"></div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2 class="fade-in">Siap Menemukan Kos Impian Anda?</h2>
            <p class="fade-in">Bergabunglah dengan ribuan pengguna yang telah menemukan kos terbaik melalui KosKu</p>
            <div class="cta-buttons fade-in">
                <a href="#" class="btn-primary">Mulai Pencarian</a>
                <a href="#" class="btn-secondary">Daftar Sekarang</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer" id="contact">
        @include('components.footer')
    </footer> 

    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
