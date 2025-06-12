<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Detail Kos - KosKu</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
</head>
<body>
<!-- Header -->
<header class="header">
    @include('components.navbar')
</header>

<!-- Detail Section -->
<!-- Detail Section -->
<section class="property-detail">
    <div class="container">
        <!-- Breadcrumb -->
        <nav class="breadcrumb">
            <a href="#">Kos</a>
            <span class="breadcrumb-separator">></span>
            <a href="#">{{ $kos->location_info['city'] }}</a>
            <span class="breadcrumb-separator">></span>
            <a href="#">{{ $kos->location_info['province'] }}</a>
            <span class="breadcrumb-separator">></span>
            <span>{{ $kos->name }}</span>
        </nav>

        <!-- Gallery Header -->
        <div class="gallery-header">
            <h2 class="gallery-title"></h2>
            <button class="show-all-photos" onclick="showAllPhotos()">
                <i class="fas fa-images"></i> Lihat semua foto
            </button>
        </div>

        <!-- Image Gallery -->
        <div class="image-gallery">
            <div class="main-image">
                <img id="currentImage" src="{{ asset('storage/' . $kos->image[0]) }}" alt="{{ $kos->name }}" width="480" height="320">
            </div>
            <div class="thumbnail-grid">
                <div class="thumbnail-row">
                    @foreach(array_slice($kos->image, 0, 6) as $img)
                        <div class="thumbnail" style="cursor:pointer;">
                            <img src="{{ asset('storage/' . $img) }}" alt="Thumbnail" width="80" height="54">
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
                        {{ $kos->gender_label ?? 'Kos' }}
                    </span>
                </div>

                <div class="title-with-save">
                    <h1 class="property-title">{{ $kos->name }}</h1>
                    <button id="saveButton" class="save-button" onclick="toggleSave({{ $kos->id }})" title="Simpan properti ini">
                        <i id="saveIcon" class="far fa-bookmark"></i>
                    </button>
                </div>

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
            <div class="section-header">
                <h3>Ulasan Penghuni</h3>
                @auth
                    <button class="add-review-btn" onclick="openModal()">
                        <i class="fas fa-plus"></i>
                        Tambah Ulasan
                    </button>
                @else
                    <a class="add-review-btn" href="{{ route('login.show') }}">
                        <i class="fas fa-plus"></i>
                        Login untuk tambah ulasan
                    </a>
                @endauth
            </div>
            <div id="reviews-container"></div>
            <div id="load-more-reviews-container" style="text-align:center;margin-top:16px;">
                <button id="loadMoreReviewsBtn" style="display:none;" class="btn btn-secondary">Lihat Lebih Banyak</button>
            </div>
        </div>

        @auth
        <div class="modal-overlay" id="modalOverlay" onclick="closeModal(event)">
            <div class="modal" onclick="event.stopPropagation()">
                <div class="modal-header">
                    <h3 class="modal-title">Tambah Ulasan</h3>
                    <button class="close-btn" onclick="closeModal()">&times;</button>
                </div>
                <form id="reviewForm" method="POST">
                    <div class="form-group">
                        <label class="form-label" for="reviewerName">Nama</label>
                        <input type="text" id="reviewerName" class="form-input" value="{{ Auth::user()->name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Rating</label>
                        <div class="star-rating" id="starRating">
                            <i class="fas fa-star star" data-rating="1"></i>
                            <i class="fas fa-star star" data-rating="2"></i>
                            <i class="fas fa-star star" data-rating="3"></i>
                            <i class="fas fa-star star" data-rating="4"></i>
                            <i class="fas fa-star star" data-rating="5"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="reviewText">Ulasan</label>
                        <textarea id="reviewText" class="form-textarea" placeholder="Tulis ulasan Anda..." required></textarea>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn btn-cancel" onclick="closeModal()">Batal</button>
                        <button type="submit" class="btn btn-submit">Kirim Ulasan</button>
                    </div>
                </form>
            </div>
        </div>
        @endauth

        @php
        $facilitiesList = [
            'wifi' => ['icon' => 'fas fa-wifi', 'label' => 'WiFi Gratis'],
            'shower' => ['icon' => 'fas fa-shower', 'label' => 'Kamar Mandi Dalam'],
            'parking' => ['icon' => 'fas fa-car', 'label' => 'Parkir'],
            'ac' => ['icon' => 'fas fa-fan', 'label' => 'AC'],
            'kitchen' => ['icon' => 'fas fa-utensils', 'label' => 'Dapur Bersama'],
            'security' => ['icon' => 'fas fa-shield-alt', 'label' => 'Keamanan 24 Jam'],
            'laundry' => ['icon' => 'fas fa-soap', 'label' => 'Laundry'],
            'pool' => ['icon' => 'fas fa-swimming-pool', 'label' => 'Kolam Renang'],
            'gym' => ['icon' => 'fas fa-dumbbell', 'label' => 'Gym'],
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
                <iframe src="https://www.google.com/maps?q={{ urlencode($kos->address) }}&output=embed"
                        width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
            <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($kos->address) }}"
               target="_blank" class="btn-lihat-maps"></a>
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
    </div> <!-- Penutup div.container -->
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
    const galleryPhotos = allPhotosFull.slice(0, 6);

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
    }        document.addEventListener('DOMContentLoaded', function() {
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

            // Check if this kos is already saved
            checkSavedStatus();
        });

        // Save/Unsave functionality
        function toggleSave(kosId) {
            const saveButton = document.getElementById('saveButton');
            const saveIcon = document.getElementById('saveIcon');
            // Optimistic UI: langsung update icon
            const wasSaved = saveButton.classList.contains('saved');
            updateSaveButton(!wasSaved);
            
            // Check if user is logged in
            @auth
                // Disable button during request
                saveButton.disabled = true;
                
                fetch(`/kos/${kosId}/toggle-save`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // updateSaveButton(data.saved); // Sudah dioptimistic, tidak perlu update ulang
                })
                .catch(error => {
                    // Jika gagal, kembalikan ke status sebelumnya
                    updateSaveButton(wasSaved);
                })
                .finally(() => {
                    saveButton.disabled = false;
                });
            @else
                // Redirect to login if not authenticated
                showNotification('Silakan login terlebih dahulu untuk menyimpan properti.', 'info');
                setTimeout(() => {
                    window.location.href = '{{ route("login.show") }}';
                }, 1500);
            @endauth
        }

        function checkSavedStatus() {
            @auth
                fetch(`/kos/{{ $kos->id }}/check-saved`)
                .then(response => response.json())
                .then(data => {
                    updateSaveButton(data.saved);
                })
                .catch(error => {
                    console.error('Error checking saved status:', error);
                });
            @endauth
        }

        function updateSaveButton(isSaved) {
            const saveIcon = document.getElementById('saveIcon');
            const saveButton = document.getElementById('saveButton');
              if (isSaved) {
                saveIcon.className = 'fas fa-bookmark';
                saveButton.classList.add('saved');
                saveButton.title = 'Hapus dari simpanan';
            } else {
                saveIcon.className = 'far fa-bookmark';
                saveButton.classList.remove('saved');
                saveButton.title = 'Simpan properti ini';
            }
        }

        function showNotification(message, type = 'info') {
            // Create notification element
            const notification = document.createElement('div');
            notification.className = `notification notification-${type}`;
            notification.innerHTML = `
                <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'}"></i>
                <span>${message}</span>
            `;
            
            // Add to page
            document.body.appendChild(notification);
            
            // Show notification
            setTimeout(() => {
                notification.classList.add('show');
            }, 100);
            
            // Hide and remove notification
            setTimeout(() => {
                notification.classList.remove('show');
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 3000);
        }
</script>
 <script>
    let selectedRating = 0;

        // Star rating functionality
        document.querySelectorAll('.star').forEach(star => {
            star.addEventListener('click', function() {
                selectedRating = parseInt(this.dataset.rating);
                updateStars();
            });

            star.addEventListener('mouseenter', function() {
                const hoverRating = parseInt(this.dataset.rating);
                highlightStars(hoverRating);
            });
        });

        document.getElementById('starRating').addEventListener('mouseleave', function() {
            updateStars();
        });

        function highlightStars(rating) {
            document.querySelectorAll('.star').forEach((star, index) => {
                if (index < rating) {
                    star.classList.add('active');
                } else {
                    star.classList.remove('active');
                }
            });
        }

        function updateStars() {
            highlightStars(selectedRating);
        }

        // Modal functionality
        function openModal() {
            document.getElementById('modalOverlay').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(event) {
            if (event && event.target !== event.currentTarget) return;
            
            document.getElementById('modalOverlay').classList.remove('active');
            document.body.style.overflow = 'auto';
            resetForm();
        }

        function resetForm() {
            document.getElementById('reviewForm').reset();
            selectedRating = 0;
            updateStars();
        }

        // Form submission
        document.getElementById('reviewForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const name = document.getElementById('reviewerName').value.trim();
            const reviewText = document.getElementById('reviewText').value.trim();
            
            if (!name || !reviewText || selectedRating === 0) {
                alert('Mohon lengkapi semua field dan berikan rating!');
                return;
            }

            addNewReview(name, selectedRating, reviewText);
            closeModal();
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });
    </script>
    <script>
        // Fetch and render reviews from backend (paginated)
        document.addEventListener('DOMContentLoaded', function() {
            fetch(`/reviews/{{ $kos->id }}`)
                .then(response => response.json())
                .then(res => {
                    const reviewsContainer = document.getElementById('reviews-container');
                    reviewsContainer.innerHTML = '';
                    const reviews = res.data || [];
                    if (reviews.length === 0) {
                        reviewsContainer.innerHTML = '<div class="review-card"><p class="review-text">Belum ada ulasan.</p></div>';
                        return;
                    }
                    reviews.forEach(review => {
                        let starsHtml = '';
                        for (let i = 1; i <= 5; i++) {
                            starsHtml += `<i class="${i <= review.rating ? 'fas' : 'far'} fa-star"></i>`;
                        }
                        const date = new Date(review.created_at);
                        const now = new Date();
                        const diffMs = now - date;
                        const diffDays = Math.floor(diffMs / (1000 * 60 * 60 * 24));
                        let dateText = diffDays === 0 ? 'Baru saja' : `${diffDays} hari yang lalu`;
                        reviewsContainer.innerHTML += `
                            <div class="review-card">
                                <div class="review-header">
                                    <img src="https://ui-avatars.com/api/?name=${encodeURIComponent(review.name)}&background=222222&color=ffffff&size=48" alt="${review.name}" class="reviewer-avatar">
                                    <div class="reviewer-info">
                                        <h4>${review.name}</h4>
                                        <div class="review-stars">${starsHtml}</div>
                                    </div>
                                    <div class="review-date">${dateText}</div>
                                </div>
                                <p class="review-text">${review.comment}</p>
                            </div>
                        `;
                    });
                });
        });

        document.getElementById("reviewForm").addEventListener("submit", function (e) {
            e.preventDefault();
            // Ambil nama dari backend, bukan dari input
            const name = document.getElementById("reviewerName").value;
            const comment = document.getElementById("reviewText").value;
            const rating = selectedRating;
            if (!name || !comment || rating === 0) {
                alert('Mohon lengkapi semua field dan berikan rating!');
                return;
            }
            fetch("/reviews", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                },
                body: JSON.stringify({ name, comment, rating, kos_id: {{ $kos->id }} })
            })
            .then(async response => {
                let text = await response.text();
                let data;
                try {
                    data = JSON.parse(text);
                } catch (e) {
                    alert('Terjadi kesalahan pada server.');
                    return;
                }
                if (!response.ok) {
                    // Tampilkan error validasi dari backend
                    if (data.errors) {
                        let msg = Object.values(data.errors).map(arr => arr.join(', ')).join('\n');
                        alert(msg);
                    } else {
                        alert('Terjadi kesalahan pada server.');
                    }
                    return;
                }
                alert("Ulasan berhasil dikirim!");
                // Reload reviews only (use .data)
                fetch(`/reviews/{{ $kos->id }}`)
                    .then(response => response.json())
                    .then(res => {
                        const reviewsContainer = document.getElementById('reviews-container');
                        reviewsContainer.innerHTML = '';
                        const reviews = res.data || [];
                        if (reviews.length === 0) {
                            reviewsContainer.innerHTML = '<div class="review-card"><p class="review-text">Belum ada ulasan.</p></div>';
                            return;
                        }
                        reviews.forEach(review => {
                            let starsHtml = '';
                            for (let i = 1; i <= 5; i++) {
                                starsHtml += `<i class="${i <= review.rating ? 'fas' : 'far'} fa-star"></i>`;
                            }
                            const date = new Date(review.created_at);
                            const now = new Date();
                            const diffMs = now - date;
                            const diffDays = Math.floor(diffMs / (1000 * 60 * 60 * 24));
                            let dateText = diffDays === 0 ? 'Baru saja' : `${diffDays} hari yang lalu`;
                            reviewsContainer.innerHTML += `
                                <div class="review-card">
                                    <div class="review-header">
                                        <img src="https://ui-avatars.com/api/?name=${encodeURIComponent(review.name)}&background=222222&color=ffffff&size=48" alt="${review.name}" class="reviewer-avatar">
                                        <div class="reviewer-info">
                                            <h4>${review.name}</h4>
                                            <div class="review-stars">${starsHtml}</div>
                                        </div>
                                        <div class="review-date">${dateText}</div>
                                    </div>
                                    <p class="review-text">${review.comment}</p>
                                </div>
                            `;
                        });
                    });
                closeModal();
            })
            .catch(error => {
                alert("Terjadi kesalahan");
                console.error(error);
            });
        });
    </script>
</body>
</html>