<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />    <title>KosKu - Temukan Kos Impian Anda</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/hero.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/search.css') }}" />

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
            <p>Discover comfortable and affordable accommodations that match your lifestyle</p>              <div class="search-container">
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
            </div><div class="search-tags">
<a href="{{ route('landing.search', ['query' => 'Near Campus']) }}" class="search-tag">Dekat Kampus</a>
<a href="{{ route('landing.search', ['query' => 'City Center']) }}" class="search-tag">Pusat Kota</a>
<a href="{{ route('landing.search', ['query' => 'Monthly Deals']) }}" class="search-tag">Promo Bulanan</a>
<a href="{{ route('landing.search', ['query' => 'Premium']) }}" class="search-tag">Kamar Eksklusif</a>

            </div>
        </div>
    </section>

    <!-- Features Section -->
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


    <!-- Properties Section -->    <section class="properties" id="properties">
        <div class="container">
            @if(isset($searchQuery))
                <div class="search-results-header">
                    <h2>
                        @if($kos->count() > 0)
                            Search Results for "{{ $searchQuery }}"
                        @else
                            No results found for "{{ $searchQuery }}"
                        @endif
                    </h2>
                    <a href="{{ route('index') }}" class="clear-search">Clear Search</a>
                </div>            @else
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
                                <i class="fas fa-map-marker-alt"></i> 
                                {{ $item->address }}
                            </p>
                            <div class="property-price">
                                Rp {{ number_format($item->price, 0, ',', '.') }}/bulan
                            </div>
                        </div>
                    </a>
                @endforeach                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
   <section class="cta-section">
    <div class="container">
        <h2>Lagi Cari Kos Nyaman?</h2>
        <p>Yuk, temukan kos impianmu dengan mudah dan cepat di KosKu!</p>
        <div class="cta-buttons">
            <a href="#" class="cta-btn primary">Cari Sekarang</a>
            <a href="#" class="cta-btn secondary">Lihat Selengkapnya</a>
        </div>
    </div>
</section>


    <!-- Footer -->
    <footer class="footer">
        @include('components.footer')
    </footer>    <script src="{{ asset('js/main.js') }}"></script>    <script>        document.addEventListener('DOMContentLoaded', function() {
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
</body>
</html>
