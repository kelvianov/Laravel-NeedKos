<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>KosKu - Temukan Kos Impian Anda</title>
    
    <!-- Preload critical hero background image for instant loading -->
    <link rel="preload" href="{{ asset('images/modernnnnnn-room.png') }}" as="image" type="image/png">
    
    <!-- Critical CSS should load first -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/hero.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/search.css') }}" />
      <!-- Font Awesome and other non-critical resources -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
      <!-- Critical inline CSS for instant hero loading -->
    <style>        /* Critical hero styles - Tiket.com layout */
        .hero {
            position: relative;
            min-height: calc(100vh - 72px);
            display: flex;
            align-items: center;
            margin-top: 72px;
            padding: 80px 0;
            overflow: hidden;
            background-color: #1a1a1a;
        }
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.4)), url('{{ asset('images/modernnnnnn-room.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: scroll;
            opacity: 1;
        }
        .hero-content {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 60px;
        }
        .hero-text {
            flex: 1;
            color: #fff;
            max-width: 500px;
            /* Isolation from navbar animations */
            position: relative;
            z-index: 3;
            transform: none !important;
            animation: none !important;
        }
        .hero-text h1 {
            font-size: clamp(2.5rem, 4vw, 3.5rem);
            font-weight: 700;
            margin-bottom: 1rem;
            line-height: 1.2;
            letter-spacing: -0.01em;
            /* Protect from navbar animations */
            transform: none !important;
            animation: none !important;
            position: relative;
            z-index: 3;
        }
        .hero-text p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            line-height: 1.6;
        }
        .hero-search-card {
            background: white;
            border-radius: 16px;
            padding: 32px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
    </style>
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        @include('components.navbar')
    </header>    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-content">            <div class="hero-text">
                <h1>Cari Kos <span style="color: #fbbf24; font-weight: inherit; background: none;">Impianmu</span></h1>
                <p>Temukan kos nyaman dengan fasilitas lengkap dan harga terjangkau di seluruh Indonesia. Mulai pencarian Anda sekarang!</p>
                
                <div class="search-tags">
                    <a href="{{ route('landing.search', ['query' => 'Dekat Kampus']) }}" class="search-tag">Dekat Kampus</a>
                    <a href="{{ route('landing.search', ['query' => 'Pusat Kota']) }}" class="search-tag">Pusat Kota</a>
                    <a href="{{ route('landing.search', ['query' => 'Monthly Deals']) }}" class="search-tag">Promo Bulanan</a>
                    <a href="{{ route('landing.search', ['query' => 'Premium']) }}" class="search-tag">Premium</a>
                </div>
            </div>
            
            <div class="hero-search-card">
                <h3 style="margin-bottom: 20px; color: #1f2937; font-size: 1.25rem; font-weight: 600;">Cari Kos Sekarang</h3>
                
                <form action="{{ route('landing.search') }}" method="GET" class="search-form">
                    <div style="margin-bottom: 16px;">
                        <label style="display: block; margin-bottom: 8px; color: #6b7280; font-weight: 500;">Lokasi</label>
                        <input type="text" name="query" placeholder="Mau cari kos dimana?" 
                               style="width: 100%; padding: 12px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem;"
                               value="{{ request('query') ?? '' }}">
                    </div>
                      <div style="display: flex; gap: 12px; margin-bottom: 20px;">
                        <div style="flex: 1;">
                            <label style="display: block; margin-bottom: 8px; color: #6b7280; font-weight: 500;">Budget</label>
                            <select id="hero-price-select" name="price_range" style="width: 100%; padding: 12px 16px; border: 1px solid #d1d5db; border-radius: 8px;">
                                <option value="">Semua Budget</option>
                                <option value="0-500000">< 500K</option>
                                <option value="500001-1000000">500K - 1M</option>
                                <option value="1000001-2000000">1M - 2M</option>
                            </select>
                        </div>
                        <div style="flex: 1;">
                            <label style="display: block; margin-bottom: 8px; color: #6b7280; font-weight: 500;">Gender</label>
                            <select id="hero-gender-select" name="gender" style="width: 100%; padding: 12px 16px; border: 1px solid #d1d5db; border-radius: 8px;">
                                <option value="">Semua</option>
                                <option value="male">Putra</option>
                                <option value="female">Putri</option>
                                <option value="mixed">Campur</option>
                            </select>
                        </div>
                    </div>
                      <button type="submit" style="width: 100%; background: #000000; color: white; padding: 14px; border: none; border-radius: 8px; font-size: 1rem; font-weight: 600; cursor: pointer;">
                        Cari Kos
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    @if(!isset($searchQuery) || empty($searchQuery))
    <section class="features">
        <div class="container">
            <h2>Why Choose KosKu</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <i class="fas fa-search"></i>
                    <h3>Pencarian Cepat & Tepat</h3>
                    <p>Temukan kos impianmu hanya dalam hitungan detik.</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-shield-alt"></i>
                    <h3>Keamanan Terjamin</h3>
                    <p>Semua kosan sudah diverifikasi. Tinggal, tenang, dan nyaman.</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-star"></i>
                    <h3>Harga Transparan</h3>
                    <p>Tidak ada biaya tersembunyi. Apa yang kamu lihat, itu yang kamu bayar.</p>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Properties Section -->
 <section class="properties" id="properties">
    <div class="container mx-auto px-4"> <!-- Pembungkus konten -->

        <div class="filter-container">
            <div class="filter-toggle" onclick="toggleFilter()">
                <div class="filter-toggle-left">
                    <div class="filter-icon">
                        <i class="fas fa-sliders-h"></i>
                    </div>
                    <div class="filter-text">
                        <div class="filter-title">Filter Pencarian</div>
                        <div class="filter-subtitle" id="filter-subtitle">Pilih kriteria untuk menyaring hasil</div>
                    </div>
                </div>
                <i class="fas fa-chevron-down filter-chevron" id="filter-chevron"></i>
            </div>

            <div class="filter-content" id="filter-content">
                <form method="GET" action="{{ route('landing.search') }}" class="filter-form" id="filter-form">
                    <input type="hidden" name="query" value="{{ $searchQuery ?? '' }}" />
                    <!-- Input tambahan untuk trigger scroll -->
                    <input type="hidden" name="scroll" value="properties" />

                    <div class="filter-group">
                        <label class="filter-label">Gender</label>
                        <select name="gender" id="gender-select" class="form-input">
                            <option value="">Semua Gender</option>
                            <option value="male" @if(request('gender')=='male') selected @endif>Laki-laki</option>
                            <option value="female" @if(request('gender')=='female') selected @endif>Perempuan</option>
                            <option value="mixed" @if(request('gender')=='mixed') selected @endif>Campuran</option>
                        </select>
                    </div>                    <div class="filter-group">
                        <label class="filter-label">Rentang Harga</label>
                        <select name="price_range" id="price-select" class="form-input">
                            <option value="">Semua Harga</option>
                            <option value="0-500000" @if(request('price_range')=='0-500000') selected @endif>Rp 0 - 500.000</option>
                            <option value="500001-1000000" @if(request('price_range')=='500001-1000000') selected @endif>Rp 500.000 - 1.000.000</option>
                            <option value="1000001-2000000" @if(request('price_range')=='1000001-2000000') selected @endif>Rp 1.000.000 - 2.000.000</option>
                        </select>
                    </div>

                    <div class="filter-group">
                        <label class="filter-label">Lokasi Strategis</label>
                        <select name="location_type" id="location-select" class="form-input">
                            <option value="">Semua Lokasi</option>
                            <option value="dekat_kampus" @if(request('location_type')=='dekat_kampus') selected @endif>Dekat Kampus</option>
                            <option value="pusat_kota" @if(request('location_type')=='pusat_kota') selected @endif>Pusat Kota</option>
                        </select>
                    </div>

                    <button type="submit" class="filter-btn">
                        <i class="fas fa-search"></i>
                        Terapkan Filter
                    </button>
                </form>

                <!-- Active Filters Display -->
                <div class="active-filters" id="active-filters" style="display: none;">
                    <button class="clear-filters" onclick="clearAllFilters()">Hapus Semua Filter</button>
                </div>
            </div>
        </div>

        {{-- Search Mode --}}
        @if(isset($searchQuery))
            <div class="section-header">
                <div class="header-left">
                    <h2>
                        @if($kos->count() > 0)
                            Search Results for "{{ $searchQuery }}"
                        @else
                            No results found for "{{ $searchQuery }}"
                        @endif
                    </h2>
                    @if($kos->count() > 1)
                        <div class="carousel-buttons">
                            <button class="carousel-btn prev-btn" aria-label="Previous">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="carousel-btn next-btn" aria-label="Next">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    @endif
                </div>
                <a href="{{ route('index') }}" class="view-all-link">
                    Clear Search
                </a>
            </div>
        @else
            <div class="section-header">
                <div class="header-left">
                    <h2>Featured Properties</h2>
                    <div class="carousel-buttons">
                        <button class="carousel-btn prev-btn" aria-label="Previous">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="carousel-btn next-btn" aria-label="Next">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
                <a href="{{ route('landing.search') }}" class="view-all-link">
                    Lihat semua
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        @endif

        <div class="carousel-container">
            <div class="properties-grid">
                @foreach($kos as $item)
                    <a href="{{ route('kos.show', $item->id) }}" class="property-card no-underline">
                        <div class="property-image" style="background-image: url('{{ asset('storage/' . (is_array($item->image) ? $item->image[0] : $item->image)) }}');">
                            <div class="property-tag">{{ $item->gender_label }}</div>
                        </div>
                        <div class="property-info">
                            <h3>{{ $item->name }}</h3>
                            <p class="property-location">
                                <i class="fas fa-map-marker-alt"></i> {{ $item->address }}
                            </p>
                            <div class="property-price">
                                Rp {{ number_format($item->price, 0, ',', '.') }}/bulan
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        {{-- Pagination --}}
        {{ $kos->links() }}

    </div> <!-- Tutup .container -->
</section>


    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2>Lagi Cari Kos Nyaman?</h2>
            <p>Yuk, temukan kos impianmu dengan mudah dan cepat di KosKu!</p>
            <div class="cta-buttons">
                <a href="{{ route('register') }}" class="cta-btn primary">Daftar Sekarang</a>
                <a href="{{ route('about') }}" class="cta-btn secondary">Lihat Selengkapnya</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        @include('components.footer')
    </footer>    <script src="{{ asset('js/main.js') }}"></script>
    
    <!-- Optimized loading script for instant hero display -->
    <script>        // Ensure immediate hero rendering        document.addEventListener('DOMContentLoaded', function() {
            // Force immediate visibility of hero elements
            const hero = document.querySelector('.hero');
            const heroContent = document.querySelector('.hero-content');
            
            if (hero) {
                hero.style.opacity = '1';
                hero.style.visibility = 'visible';
            }
            if (heroContent) {
                heroContent.style.opacity = '1';
                heroContent.style.visibility = 'visible';
            }
        });        
    </script>
    <script src="{{ asset('js/filter.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    <script>
        // Initialize Choices.js for hero section dropdowns
        document.addEventListener('DOMContentLoaded', function () {
            const heroPriceSelect = document.getElementById('hero-price-select');
            const heroGenderSelect = document.getElementById('hero-gender-select');

            if (heroPriceSelect) {
                new Choices(heroPriceSelect, {
                    searchEnabled: false,
                    itemSelectText: '',
                    shouldSort: false
                });
            }

            if (heroGenderSelect) {
                new Choices(heroGenderSelect, {
                    searchEnabled: false,
                    itemSelectText: '',
                    shouldSort: false
                });
            }
        });
    </script>
<script>
// Typewriter animasi, pastikan warna kuning pada 'Impian' selama dan setelah animasi
window.addEventListener('load', () => {
  const heroTitle = document.querySelector('.hero h1');
  if (!heroTitle) return;
  setTimeout(() => {
    const before = 'Cari Kos ';
    const impian = 'Impianmu';
    const after = ' ';

    let i = 0;
    function type() {
      if (i <= before.length) {
        heroTitle.innerHTML = before.slice(0, i);
      } else if (i <= before.length + impian.length) {
        heroTitle.innerHTML = before + '<span style="color:#fbbf24; font-weight:inherit; background:none;">' + impian.slice(0, i-before.length) + '</span>';
      } else {
        heroTitle.innerHTML = before + '<span style="color:#fbbf24; font-weight:inherit; background:none;">' + impian + '</span>' + after;
        return;
      }
      i++;
      setTimeout(type, 80);
    }
    type();
  }, 1000);
});
</script>
</body>
</html>
