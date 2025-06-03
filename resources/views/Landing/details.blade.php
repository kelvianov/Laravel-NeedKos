<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kos - KosKu</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        /* Layout Structure */
        .page-wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .main-content {
            flex: 1;
        }

        .property-detail {
            padding-top: 100px;
            padding-bottom: 40px;
            background: #f8f9fa;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* Header placeholder */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 80px;
            background: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 100;
        }

        .header h1 {
            color: #222;
            font-size: 1.5rem;
        }

        /* Breadcrumb */
        .breadcrumb {
            margin-bottom: 24px;
            padding: 12px 0;
        }

        .breadcrumb a {
            color: #666;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .breadcrumb a:hover {
            color: #222;
        }

        .breadcrumb-separator {
            margin: 0 8px;
            color: #999;
        }

        /* Gallery Header */
        .gallery-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        .gallery-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #222;
        }

        .show-all-photos {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #222;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            border: none;
        }

        .show-all-photos:hover {
            background: #444;
            color: white;
        }

        /* Image Gallery Section */
        .image-gallery {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 8px;
            height: 400px;
            margin-bottom: 24px;
            border-radius: 16px;
            overflow: hidden;
        }

        .main-image {
            position: relative;
            overflow: hidden;
        }

        .main-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            border-radius: 16px;
        }

        .thumbnail-grid {
            display: grid;
            grid-template-rows: 1fr 1fr;
            gap: 8px;
        }

        .thumbnail-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 8px;
        }

        .thumbnail {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            cursor: pointer;
        }

        .thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Property Header */
        .property-header {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 40px;
            margin-bottom: 32px;
        }

        .property-info-left {
            padding-right: 20px;
        }

        .property-badges {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 600;
            gap: 6px;
            text-transform: uppercase;
        }

        .badge-type {
            background: #222;
            color: #fff;
        }

        .badge-status {
            background: #16a34a;
            color: #fff;
        }

        .rating-text {
            color: #dc2626;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .property-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #222;
            margin: 0 0 16px 0;
            line-height: 1.2;
        }

        .property-rating {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 8px;
        }

        .rating-stars {
            color: #f59e0b;
            font-size: 1rem;
        }

        .rating-info {
            color: #666;
            font-size: 0.9rem;
        }

        .property-location {
            color: #666;
            font-size: 1rem;
            margin-bottom: 16px;
        }

        /* Price Section */
        .price-section {
            text-align: right;
            padding: 24px;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            border: 1px solid #f1f5f9;
            height: fit-content;
        }

        .price-label {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 8px;
        }

        .price-main {
            font-size: 2rem;
            font-weight: 700;
            color: #000000;
            margin-bottom: 4px;
        }

        .price-period {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 20px;
        }

        .book-button {
            width: 100%;
            background: #000000;
            color: #fff;
            border: none;
            padding: 16px 24px;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .book-button:hover {
            background: #333;
        }

        /* Navigation Tabs */
        .property-nav {
            border-bottom: 2px solid #f1f5f9;
            margin-bottom: 32px;
        }

        .nav-tabs {
            display: flex;
            gap: 0;
            overflow-x: auto;
        }

        .nav-tab {
            padding: 16px 24px;
            background: none;
            border: none;
            color: #666;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            border-bottom: 3px solid transparent;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .nav-tab.active {
            color: #000000;
            border-bottom-color: #000000;
        }

        .nav-tab:hover {
            color: #000000;
        }

        /* Content Sections */
        .content-section {
            display: none;
            background: #fff;
            padding: 32px;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            margin-bottom: 24px;
        }

        .content-section.active {
            display: block;
        }

        .content-section h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #222;
            margin-bottom: 20px;
        }

        .content-section p {
            color: #444;
            line-height: 1.6;
            margin-bottom: 16px;
        }

        /* Facilities Grid */
        .facilities-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            margin-top: 20px;
        }

        .facility-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            background: #f8f9fa;
            border-radius: 8px;
            border-left: 4px solid #222;
        }

        .facility-item i {
            color: #222;
            font-size: 1.1rem;
        }

        .facility-item span {
            color: #222;
            font-weight: 500;
        }

        /* Reviews */
        .review-card {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 20px;
            border-left: 4px solid #222;
        }

        .review-header {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 16px;
        }

        .reviewer-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
        }

        .reviewer-info h4 {
            color: #222;
            font-weight: 600;
            margin: 0 0 4px 0;
        }

        .review-stars {
            color: #f59e0b;
        }

        .review-date {
            color: #666;
            font-size: 0.85rem;
            margin-left: auto;
        }

        .review-text {
            color: #444;
            line-height: 1.6;
        }

        /* Contact Info */
        .contact-info {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 16px;
            background: #f8f9fa;
            border-radius: 12px;
            margin-top: 20px;
        }

        .contact-info i {
            color: #222;
            font-size: 1.2rem;
        }

        .contact-info span {
            color: #222;
            font-weight: 600;
            font-size: 1.1rem;
        }

        /* Action Button */
        .action-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            background: #222;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            margin-top: 20px;
            transition: all 0.3s ease;
        }

        .action-button:hover {
            background: #444;
            color: #fff;
        }

        /* Footer */
        .footer {
          
            color: #fff;
            padding: 40px 0 20px;
            margin-top: 40px;
        }

        .footer-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 24px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .footer-section h3 {
            margin-bottom: 20px;
            color: #fff;
        }

        .footer-section p,
        .footer-section a {
            color: #ccc;
            text-decoration: none;
            margin-bottom: 10px;
            display: block;
        }

        .footer-section a:hover {
            color: #fff;
        }

        .footer-bottom {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #444;
            color: #999;
        }

        /* Photo Modal */
        .photo-modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.9);
        }

        .photo-modal.active {
            display: block;
        }

        .modal-content {
            position: relative;
            margin: auto;
            padding: 20px;
            width: 90%;
            max-width: 1200px;
            height: 100vh;
            overflow-y: auto;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #333;
        }

        .modal-title {
            color: white;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .close-modal {
            color: white;
            font-size: 2rem;
            cursor: pointer;
            background: none;
            border: none;
            padding: 0;
            line-height: 1;
        }

        .close-modal:hover {
            color: #ccc;
        }

        .photo-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px 0;
        }

        .photo-item {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .photo-item:hover {
            transform: scale(1.05);
        }

        .photo-item img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .photo-counter {
            position: absolute;
            top: 10px;
            left: 10px;
            background: rgba(0,0,0,0.7);
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 0.8rem;
        }

        /* Large Photo View */
        .large-photo-view {
            display: none;
            position: fixed;
            z-index: 1001;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.95);
        }

        .large-photo-view.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .large-photo-container {
            position: relative;
            max-width: 90%;
            max-height: 90%;
        }

        .large-photo-container img {
            width: 100%;
            height: auto;
            max-height: 80vh;
            object-fit: contain;
        }

        .photo-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgb(255, 255, 255);
            color: white;
            border: none;
            padding: 15px 20px;
            cursor: pointer;
            font-size: 1.5rem;
            border-radius: 5px;
        }

        .photo-nav:hover {
            background: rgba(255, 255, 255, 0.9);
        }

        .photo-nav.prev {
            left: -60px;
        }

        .photo-nav.next {
            right: -60px;
        }

        .close-large-view {
            position: absolute;
            top: -50px;
            right: 0;
            color: white;
            font-size: 2rem;
            cursor: pointer;
            background: none;
            border: none;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .property-header {
                grid-template-columns: 1fr;
                gap: 24px;
            }
            
            .price-section {
                text-align: left;
            }
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 16px;
            }
            
            .gallery-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }
            
            .image-gallery {
                grid-template-columns: 1fr;
                height: 300px;
            }
            
            .thumbnail-grid {
                display: none;
            }
            
            .property-title {
                font-size: 2rem;
            }
            
            .nav-tabs {
                gap: 0;
            }
            
            .nav-tab {
                padding: 12px 16px;
                font-size: 0.9rem;
            }
            
            .facilities-grid {
                grid-template-columns: 1fr;
            }

            .footer-content {
                grid-template-columns: 1fr;
                text-align: center;
            }

        }
    </style>
</head>
<body>

<!-- Header -->
<header class="header">
    @include('components.navbar')
</header>

<!-- Detail Section -->
<section class="property-detail">
    <div class="container">
        <!-- Breadcrumb -->
        <nav class="breadcrumb">
            <a href="#">Kos</a>
            <span class="breadcrumb-separator">></span>
            <a href="#">Bandung</a>
            <span class="breadcrumb-separator">></span>
            <a href="#">West Java</a>
            <span class="breadcrumb-separator">></span>
            <span>{{ $kos->name }}</span>
        </nav>

        <!-- Gallery Header -->
        <div class="gallery-header">
            <h2 class="gallery-title">Foto Properti</h2>
            <button class="show-all-photos" onclick="showAllPhotos()">
                <i class="fas fa-images"></i> Lihat semua foto
            </button>
        </div>

        <!-- Image Gallery -->
        <div class="image-gallery">
            <div class="main-image">
                <img id="currentImage" src="{{ asset('storage/' . $kos->image[0]) }}" alt="{{ $kos->name }}">
            </div>
            <div class="thumbnail-grid">
                <div class="thumbnail-row">
                   @foreach(array_slice($kos->image, 0, 4) as $img)
    <div class="thumbnail" style="cursor:pointer;">
        <img src="{{ asset('storage/' . $img) }}" alt="Thumbnail">
    </div>
@endforeach
                </div>
            </div>
        </div>

        <!-- Property Header -->
        <div class="property-header">
            <div class="property-info-left">
                <div class="property-badges">
                    <span class="badge badge-type">
                        {{ $kos->type ?? 'Kos' }}
                    </span>
                </div>

                <h1 class="property-title">{{ $kos->name }}</h1>

                <div class="property-rating">
                    <div class="rating-stars">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="fa{{ $i <= ($kos->rating ?? 0) ? 's' : 'r' }} fa-star"></i>
                        @endfor
                    </div>
                    <span class="rating-info">{{ $kos->rating ?? 0 }}/5 ({{ $kos->review_count ?? 0 }} review)</span>
                </div>

                <div class="property-location">{{ $kos->address }}</div>
            </div>

            <div class="price-section">
                <div class="price-label">Mulai dari</div>
                <div class="price-main">IDR {{ number_format($kos->price, 0, ',', '.') }}</div>
                <div class="price-period">/bulan</div>
                <button class="book-button">Lihat kamar</button>
            </div>
        </div>

        <!-- Navigation Tabs -->
        <nav class="property-nav">
            <div class="nav-tabs">
                <button class="nav-tab active" onclick="showTab('info')">Info Umum</button>
                <button class="nav-tab" onclick="showTab('review')">Review</button>
                <button class="nav-tab" onclick="showTab('fasilitas')">Fasilitas Populer</button>
                <button class="nav-tab" onclick="showTab('lokasi')">Lokasi</button>
                <button class="nav-tab" onclick="showTab('kebijakan')">Kebijakan Akomodasi</button>
                <button class="nav-tab" onclick="showTab('tentang')">Tentang</button>
                <button class="nav-tab" onclick="showTab('kamar')">Kamar</button>
            </div>
        </nav>

        <!-- Content Sections -->
        <div class="content-section active" id="info">
            <h3>Tentang {{ $kos->name }}</h3>
            <p>{{ $kos->description }}</p>
            
            <h3>Peraturan Kos</h3>
            <p>{{ $kos->rules }}</p>

            <div class="contact-info">
                <i class="fas fa-phone"></i>
                <span>{{ $kos->contact_person }}</span>
            </div>

            <a href="#" class="action-button">
                <i class="fas fa-key"></i>
                Ajukan Sewa
            </a>
        </div>

        <div class="content-section" id="review">
            <h3>Ulasan Penghuni</h3>
            
            <div class="review-card">
                <div class="review-header">
                    <img src="https://ui-avatars.com/api/?name=Andi&background=222222&color=ffffff&size=48" 
                         alt="Andi" 
                         class="reviewer-avatar">
                    <div class="reviewer-info">
                        <h4>Andi</h4>
                        <div class="review-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                    <div class="review-date">2 hari yang lalu</div>
                </div>
                <p class="review-text">Kos nyaman, fasilitas lengkap, dan pemilik ramah. Lokasi strategis dekat kampus.</p>
            </div>

            <div class="review-card">
                <div class="review-header">
                    <img src="https://ui-avatars.com/api/?name=Siti&background=222222&color=ffffff&size=48" 
                         alt="Siti" 
                         class="reviewer-avatar">
                    <div class="reviewer-info">
                        <h4>Siti</h4>
                        <div class="review-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                    <div class="review-date">1 minggu yang lalu</div>
                </div>
                <p class="review-text">Lingkungan tenang, kamar bersih, harga sesuai fasilitas. Recommended!</p>
            </div>
        </div>

    @php
    // Mapping fasilitas ke icon dan label
    $facilitiesList = [
        'wifi' => ['icon' => 'fas fa-wifi', 'label' => 'WiFi Gratis'],
        'shower' => ['icon' => 'fas fa-shower', 'label' => 'Kamar Mandi Dalam'],
        'parking' => ['icon' => 'fas fa-car', 'label' => 'Parkir'],
        'ac' => ['icon' => 'fas fa-fan', 'label' => 'AC'],
        'tv' => ['icon' => 'fas fa-tv', 'label' => 'TV'],
        'kitchen' => ['icon' => 'fas fa-utensils', 'label' => 'Dapur Bersama'],
    ];
@endphp

<div class="content-section" id="fasilitas">
    <h3>Fasilitas Populer</h3>
    <div class="facilities-grid">
        @foreach ($kos->facilities ?? [] as $facilityKey)
            @if (isset($facilitiesList[$facilityKey]))
                <div class="facility-item">
                    <i class="{{ $facilitiesList[$facilityKey]['icon'] }}"></i>
                    <span>{{ $facilitiesList[$facilityKey]['label'] }}</span>
                </div>
            @endif
        @endforeach
    </div>
</div>

        <div class="content-section" id="lokasi">
    <h3>Lokasi</h3>
    <p><i class="fas fa-map-marker-alt"></i> {{ $kos->address }}</p>


    <div class="map-container" style="margin-top: 24px; border-radius: 12px; overflow: hidden;">
        <iframe 
            src="https://www.google.com/maps?q={{ urlencode($kos->address) }}&output=embed"
            width="100%" 
            height="350" 
            frameborder="0" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>

    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($kos->address) }}"
   target="_blank"
   class="btn-lihat-maps">
  
</a>
</div>

        <div class="content-section" id="kebijakan">
            <h3>Kebijakan Akomodasi</h3>
            <p>{{ $kos->rules }}</p>
        </div>

        <div class="content-section" id="tentang">
            <h3>Tentang Properti</h3>
            <p>{{ $kos->description }}</p>
        </div>

        <div class="content-section" id="kamar">
            <h3>Kamar Tersedia</h3>
            <p>Status: <strong>{{ $kos->status ?? 'Tersedia' }}</strong></p>
            <p>Harga: <strong>Rp {{ number_format($kos->price, 0, ',', '.') }}/bulan</strong></p>
        </div>
    </div>
</section>

<!-- Photo Modal -->
<div class="photo-modal" id="photoModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">Semua Foto Properti</h3>
            <button class="close-modal" onclick="closePhotoModal()">&times;</button>
        </div>
        <div class="photo-grid" id="photoGrid">
            <!-- Photos will be dynamically loaded here -->
        </div>
    </div>
</div>

<!-- Large Photo View -->
<div class="large-photo-view" id="largePhotoView">
    <div class="large-photo-container">
        <button class="close-large-view" onclick="closeLargeView()">&times;</button>
        <button class="photo-nav prev" onclick="prevPhoto()">&#8249;</button>
        <img id="largePhoto" src="" alt="Large view">
        <button class="photo-nav next" onclick="nextPhoto()">&#8250;</button>
    </div>
</div>

<!-- Footer -->
<footer class="footer" id="contact">
    @include('components.footer')
</footer>

<script>
    // Semua foto dari backend, untuk modal "Lihat Semua Foto"
    const allPhotosFull = [
        @foreach($kos->image as $img)
            '{{ asset("storage/" . $img) }}'{{ !$loop->last ? ',' : '' }}
        @endforeach
    ];

    // Galeri utama hanya tampil 5 foto (maksimal)
    const galleryPhotos = allPhotosFull.slice(0, 5);

    let currentPhotoIndex = 0;

    function showTab(tabName) {
        const sections = document.querySelectorAll('.content-section');
        sections.forEach(section => section.classList.remove('active'));
        const tabs = document.querySelectorAll('.nav-tab');
        tabs.forEach(tab => tab.classList.remove('active'));
        document.getElementById(tabName).classList.add('active');
        event.target.classList.add('active');
    }

    function showAllPhotos() {
        const modal = document.getElementById('photoModal');
        const photoGrid = document.getElementById('photoGrid');
        photoGrid.innerHTML = '';

        allPhotosFull.forEach((photo, index) => {
            const photoItem = document.createElement('div');
            photoItem.className = 'photo-item';
            photoItem.onclick = () => showLargePhoto(index);
            photoItem.innerHTML = `
                <img src="${photo}" alt="Foto ${index + 1}">
                <div class="photo-counter">${index + 1} / ${allPhotosFull.length}</div>
            `;
            photoGrid.appendChild(photoItem);
        });

        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closePhotoModal() {
        const modal = document.getElementById('photoModal');
        modal.classList.remove('active');
        document.body.style.overflow = 'auto';
    }

    function showLargePhoto(index) {
        currentPhotoIndex = index;
        const largeView = document.getElementById('largePhotoView');
        const largePhoto = document.getElementById('largePhoto');
        largePhoto.src = allPhotosFull[currentPhotoIndex];
        largeView.classList.add('active');
    }

    function closeLargeView() {
        document.getElementById('largePhotoView').classList.remove('active');
    }

    function nextPhoto() {
        currentPhotoIndex = (currentPhotoIndex + 1) % allPhotosFull.length;
        document.getElementById('largePhoto').src = allPhotosFull[currentPhotoIndex];
    }

    function prevPhoto() {
        currentPhotoIndex = (currentPhotoIndex - 1 + allPhotosFull.length) % allPhotosFull.length;
        document.getElementById('largePhoto').src = allPhotosFull[currentPhotoIndex];
    }

    document.addEventListener('DOMContentLoaded', function() {
        const mainImage = document.getElementById('currentImage');
        const thumbnails = document.querySelectorAll('.thumbnail img');
        thumbnails.forEach(thumb => {
            thumb.addEventListener('click', () => {
                mainImage.src = thumb.src;
            });
        });

        document.getElementById('photoModal').addEventListener('click', function(e) {
            if (e.target === this) closePhotoModal();
        });

        document.getElementById('largePhotoView').addEventListener('click', function(e) {
            if (e.target === this) closeLargeView();
        });

        document.addEventListener('keydown', function(e) {
            if (document.getElementById('largePhotoView').classList.contains('active')) {
                if (e.key === 'ArrowRight') nextPhoto();
                if (e.key === 'ArrowLeft') prevPhoto();
                if (e.key === 'Escape') closeLargeView();
            }
            if (document.getElementById('photoModal').classList.contains('active')) {
                if (e.key === 'Escape') closePhotoModal();
            }
        });
    });
</script>




<script>
    const mainImage = document.getElementById('currentImage');
    const thumbnails = document.querySelectorAll('.thumbnail img');

    thumbnails.forEach(thumb => {
        thumb.addEventListener('click', () => {
            mainImage.src = thumb.src;
        });
    });
</script>

<sc src="{{ asset('js/main.js') }}"></sc>
</body>
</html>