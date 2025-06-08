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
    <style>
        /* Critical hero styles for instant loading */
        .hero {
            position: relative;
            min-height: calc(100vh - 72px);
            display: flex;
            align-items: center;
            margin-top: 72px;
            padding: 60px 0;
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
            background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('{{ asset('images/modernnnnnn-room.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: scroll;
            opacity: 1;
            will-change: auto;
        }
        .hero-content {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
            text-align: center;
            color: #fff;
            opacity: 1;
            visibility: visible;
        }
        .hero-content h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            line-height: 1.2;
            text-rendering: optimizeSpeed;
        }
        .search-container {
            background: #fff;
            max-width: 700px;
            margin: 0 auto;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
            opacity: 1;
            visibility: visible;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        @include('components.navbar')
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-content">
            <h1>Find Your Perfect Stay</h1>
            <p>Discover comfortable and affordable accommodations that match your lifestyle</p>
            <div class="search-container">
                <form action="{{ route('landing.search') }}" method="GET" class="search-form">
                    <div class="search-input-container">
                        <input 
                            type="text" 
                            name="query"
                            class="search-input" 
                            placeholder="Mau tinggal di mana..."
                            value="{{ $searchQuery ?? '' }}"
                            required
                            autocomplete="off"
                        >
                        <div class="city-suggestions" style="hidden: none;">
                            @isset($locations)
                                @foreach($locations as $city)
                                    <div class="city-header" data-city-header="{{ $city['name'] }}">
                                        <div class="city-suggestion" data-city="{{ $city['name'] }}" data-type="city">
                                            <i class="fas fa-city"></i> {{ $city['name'] }}
                                        </div>
                                        @foreach($city['areas'] as $area)
                                            <div class="city-suggestion area-suggestion" 
                                                 data-city="{{ $area['name'] }}" 
                                                 data-type="area"
                                                 data-parent="{{ $city['name'] }}">
                                                <i class="fas fa-map-marker-alt"></i> {{ $area['name'] }}
                                                <span class="area-city">{{ $city['name'] }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            @endisset
                        </div>
                    </div>
                    <button type="submit" class="search-btn">
                        <i class="fas fa-search"></i> Search
                    </button>
                </form>
            </div>
            <div class="search-tags">
                <a href="{{ route('landing.search', ['query' => 'Dekat Kampus']) }}" class="search-tag">Dekat Kampus</a>
                <a href="{{ route('landing.search', ['query' => 'Pusat Kota']) }}" class="search-tag">Pusat Kota</a>
                <a href="{{ route('landing.search', ['query' => 'Monthly Deals']) }}" class="search-tag">Promo Bulanan</a>
                <a href="{{ route('landing.search', ['query' => 'Premium']) }}" class="search-tag">Kamar Eksklusif</a>
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
    <script>
        // Ensure immediate hero rendering
        document.addEventListener('DOMContentLoaded', function() {
            // Force immediate visibility of hero elements
            const hero = document.querySelector('.hero');
            const heroContent = document.querySelector('.hero-content');
            const searchContainer = document.querySelector('.search-container');
            
            if (hero) {
                hero.style.opacity = '1';
                hero.style.visibility = 'visible';
            }
            if (heroContent) {
                heroContent.style.opacity = '1';
                heroContent.style.visibility = 'visible';
            }
            if (searchContainer) {
                searchContainer.style.opacity = '1';
                searchContainer.style.visibility = 'visible';
            }
            
            // Rest of the original functionality
            const searchForm = document.querySelector('.search-form');
            const searchInput = document.querySelector('.search-input');
            const searchTags = document.querySelectorAll('.search-tag');
            const citySuggestions = document.querySelector('.city-suggestions');
            const cityItems = document.querySelectorAll('.city-suggestion');
            let currentFocus = -1;

            // Show suggestions on input focus
            searchInput.addEventListener('focus', () => {
                searchForm.classList.add('focused');
                if (searchInput.value.length > 0) {
                    filterLocations(searchInput.value);
                }
                citySuggestions.style.display = 'block';
            });

            // Hide suggestions when clicking outside
            document.addEventListener('click', (e) => {
                if (!searchForm.contains(e.target)) {
                    citySuggestions.style.display = 'none';
                }
            });

            // Handle keyboard navigation
            searchInput.addEventListener('keydown', (e) => {
                const activeItems = [...cityItems].filter(item => item.style.display !== 'none');

                if (e.key === 'ArrowDown') {
                    e.preventDefault();
                    currentFocus++;
                    addActive(activeItems);
                } else if (e.key === 'ArrowUp') {
                    e.preventDefault();
                    currentFocus--;
                    addActive(activeItems);
                } else if (e.key === 'Enter' && currentFocus > -1) {
                    e.preventDefault();
                    if (activeItems[currentFocus]) {
                        activeItems[currentFocus].click();
                    }
                }
            });

            // Filter locations as user types
            searchInput.addEventListener('input', (e) => {
                filterLocations(e.target.value);
                currentFocus = -1;
            });

            // Handle location selection
            cityItems.forEach(item => {
                item.addEventListener('click', () => {
                    searchInput.value = item.dataset.city;
                    citySuggestions.style.display = 'none';
                    searchForm.submit();
                });
            });

            function addActive(items) {
                removeActive(items);
                if (currentFocus >= items.length) currentFocus = 0;
                if (currentFocus < 0) currentFocus = items.length - 1;
                if (items[currentFocus]) {
                    items[currentFocus].classList.add('active');
                    items[currentFocus].scrollIntoView({ block: 'nearest' });
                }
            }

            function removeActive(items) {
                items.forEach(item => item.classList.remove('active'));
            }

            function filterLocations(query) {
                const q = query.toLowerCase();
                let hasMatches = false;

                cityItems.forEach(item => {
                    const location = item.dataset.city.toLowerCase();
                    const type = item.dataset.type;
                    const isMatch = location.includes(q);

                    if (isMatch) {
                        item.style.display = 'flex';
                        if (type === 'area') {
                            const cityHeader = document.querySelector(`[data-city-header="${item.dataset.parent}"]`);
                            if (cityHeader) cityHeader.style.display = 'block';
                        }
                        hasMatches = true;
                    } else {
                        item.style.display = 'none';
                    }
                });

                citySuggestions.style.display = hasMatches ? 'block' : 'none';
            }

            // Add loading state to form on submit
            searchForm.addEventListener('submit', () => {
                if (searchInput.value.trim()) {
                    searchForm.classList.add('loading');
                }
            });

            // Carousel functionality
            const prevBtn = document.querySelector('.prev-btn');
            const nextBtn = document.querySelector('.next-btn');
            const propertiesGrid = document.querySelector('.properties-grid');
            const propertyCards = document.querySelectorAll('.property-card');

            let currentPosition = 0;
            const cardWidth = propertyCards[0]?.offsetWidth || 0;
            const gap = 24; // This should match the gap in CSS
            const cardsPerView = window.innerWidth > 768 ? 3 : 1;
            const maxPosition = Math.max(0, propertyCards.length - cardsPerView);

            function updateCarouselButtons() {
                prevBtn.style.opacity = currentPosition === 0 ? '0.5' : '1';
                nextBtn.style.opacity = currentPosition >= maxPosition ? '0.5' : '1';
            }

            prevBtn.addEventListener('click', () => {
                if (currentPosition > 0) {
                    currentPosition--;
                    const translateX = -(currentPosition * (cardWidth + gap));
                    propertiesGrid.style.transform = `translateX(${translateX}px)`;
                    updateCarouselButtons();
                }
            });

            nextBtn.addEventListener('click', () => {
                if (currentPosition < maxPosition) {
                    currentPosition++;
                    const translateX = -(currentPosition * (cardWidth + gap));
                    propertiesGrid.style.transform = `translateX(${translateX}px)`;
                    updateCarouselButtons();
                }
            });

            // Initialize carousel state
            updateCarouselButtons();

            // Update carousel on window resize
            window.addEventListener('resize', () => {
                currentPosition = 0;
                propertiesGrid.style.transform = 'translateX(0)';
                updateCarouselButtons();
            });
        });

        
    </script>
    <script src="{{ asset('js/filter.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
</body>
</html>
