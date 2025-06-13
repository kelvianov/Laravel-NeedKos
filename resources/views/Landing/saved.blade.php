<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kos Tersimpan - KosKu</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/saved.css') }}">
</head>
<body>
    <!-- Header -->
    <header class="header">
        @include('components.navbar')
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <!-- Page Header -->
            <div class="page-header">
                <h1 class="page-title">
                    <i class="fas fa-bookmark"></i>
                    Kos Tersimpan
                </h1>
                <p class="page-description">Kumpulan kos yang telah Anda simpan untuk referensi masa depan</p>
            </div>

            <!-- Saved Properties Content -->
            <div class="saved-content">
                @if($savedKos->count() > 0)
                    <!-- Statistics -->
                    <div class="saved-stats">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-bookmark"></i>
                            </div>
                            <div class="stat-info">
                                <h3>{{ $savedKos->count() }}</h3>
                                <p>Properti Tersimpan</p>
                            </div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="stat-info">
                                <h3>{{ $savedKos->pluck('location_info.city')->unique()->count() }}</h3>
                                <p>Kota Berbeda</p>
                            </div>
                        </div>
                    </div>                    <!-- Properties Grid Carousel Controls -->
                    <div class="section-header" style="display: flex; align-items: center; gap: 12px; margin-bottom: 8px;">
                        <div style="font-weight:600;font-size:1.1rem;color:#222;">Properti Tersimpan</div>
                        <div class="carousel-buttons">
                            <button class="carousel-btn prev-btn" aria-label="Previous" style="border:none;background:#fff;padding:8px 12px;border-radius:6px;margin-right:4px;box-shadow:0 1px 4px #eee;cursor:pointer;">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="carousel-btn next-btn" aria-label="Next" style="border:none;background:#fff;padding:8px 12px;border-radius:6px;box-shadow:0 1px 4px #eee;cursor:pointer;">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Properties Grid -->
                    <div class="properties-grid">
                        @foreach($savedKos as $kos)
                            <div class="property-card" data-kos-id="{{ $kos->id }}">
                                <div class="property-image">
                                    <img src="{{ asset('storage/' . $kos->image[0]) }}" alt="{{ $kos->name }}" width="360" height="200">
                                    <div class="property-badge">
                                        {{ $kos->gender_label ?? 'Kos' }}
                                    </div>
                                    <button class="remove-saved-btn" onclick="removeSaved({{ $kos->id }})" title="Hapus dari tersimpan">
                                        <i class="fas fa-bookmark"></i>
                                    </button>
                                </div>

                                <div class="property-info">
                                    <h3 class="property-title">
                                        <a href="{{ route('kos.show', $kos->id) }}">{{ $kos->name }}</a>
                                    </h3>
                                    <div class="property-location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        {{ $kos->address }}
                                    </div>
                                    <div class="property-rating">
                                        <div class="rating-stars">
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class="fa{{ $i <= ($kos->rating ?? 0) ? 's' : 'r' }} fa-star"></i>
                                            @endfor
                                        </div>
                                        <span class="rating-text">{{ $kos->rating ?? 0 }}/5 ({{ $kos->review_count ?? 0 }} review)</span>
                                    </div>
                                    <div class="property-price">
                                        IDR {{ number_format($kos->price, 0, ',', '.') }}/bulan
                                    </div>
                                    <div class="property-saved-date">
                                        <i class="fas fa-calendar-alt"></i>
                                        Disimpan {{ $kos->pivot->created_at->diffForHumans() }}
                                    </div>
                                    <div class="property-actions">
                                        <a href="{{ route('kos.show', $kos->id) }}" class="btn-view">
                                            <i class="fas fa-eye"></i>
                                            Lihat Detail
                                        </a>
                                        <button class="btn-contact" onclick="contactOwner('{{ $kos->contact_person }}')">
                                            <i class="fas fa-phone"></i>
                                            Hubungi
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination if needed -->
                    @if($savedKos->hasPages())
                        <div class="pagination-wrapper">
                            {{ $savedKos->links() }}
                        </div>
                    @endif
                @else
                    <!-- Empty State -->
                    <div class="empty-state">
                        <div class="empty-icon">
                            <i class="far fa-bookmark"></i>
                        </div>
                        <h2>Belum Ada Kos Tersimpan</h2>
                        <p>Anda belum menyimpan properti apapun. Mulai jelajahi dan simpan kos favorit Anda!</p>
                        <a href="{{ route('landing.search') }}" class="btn-explore">
                            <i class="fas fa-search"></i>
                            Jelajahi Kos
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </main>

    <!-- Footer -->
    @include('components.footer')

    <!-- JavaScript -->
    <script>
        async function removeSaved(kosId) {
            try {
                const response = await fetch(`/kos/${kosId}/toggle-save`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                });

                const data = await response.json();

                if (data.success) {                    const propertyCard = document.querySelector(`[data-kos-id="${kosId}"]`);
                    if (propertyCard) {
                        propertyCard.style.animation = 'fadeOut 0.1s ease forwards';
                        setTimeout(() => {
                            propertyCard.remove();
                            const remainingCards = document.querySelectorAll('.property-card').length;
                            if (remainingCards === 0) {
                                location.reload();
                            }
                        }, 100);
                    }
                }
            } catch (error) {
                console.error('Error:', error);
            }
        }

        function contactOwner(contactInfo) {
            if (contactInfo) {
                window.open(`tel:${contactInfo}`, '_self');
            }
        }

        const style = document.createElement('style');
        style.textContent = `
            @keyframes fadeOut {
                from { opacity: 1; transform: scale(1); }
                to { opacity: 0; transform: scale(0.95); }
            }
        `;
        document.head.appendChild(style);
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const prevBtn = document.querySelector('.prev-btn');
            const nextBtn = document.querySelector('.next-btn');
            const propertiesGrid = document.querySelector('.properties-grid');
            const propertyCards = document.querySelectorAll('.property-card');
            const cardWidth = propertyCards[0]?.offsetWidth || 340;
            const gap = 24;
            const scrollStep = cardWidth + gap;

            prevBtn.addEventListener('click', function() {
                propertiesGrid.scrollBy({ left: -scrollStep, behavior: 'smooth' });
            });
            nextBtn.addEventListener('click', function() {
                propertiesGrid.scrollBy({ left: scrollStep, behavior: 'smooth' });
            });
        });
    </script>
</body>
</html>