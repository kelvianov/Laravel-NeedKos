<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kos - KosKu</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="details-page">

<!-- Header -->
<header class="header">
  @include('components.navbar')
</header>

<!-- Detail Section -->
<section class="property-detail" style="padding: 60px 20px;">
    <div class="container">
        <h1 class="section-title fade-in">{{ $kos->name }}</h1>
        <div class="property-detail-grid fade-in" style="display: flex; flex-wrap: wrap; gap: 30px;">
            <div class="property-images" style="flex: 1;">
                <img src="{{ asset('storage/' . $kos->image) }}" alt="{{ $kos->name }}" style="width: 100%; border-radius: 10px;">
            </div>
            <div class="property-info" style="flex: 1;">
                <div class="property-price" style="font-size: 24px; font-weight: bold;">
                    Rp {{ number_format($kos->price, 0, ',', '.') }}/bulan
                </div>
                <div class="property-location" style="margin: 10px 0;">
                    <i class="fas fa-map-marker-alt"></i> {{ $kos->address }}
                </div>
                <div class="property-facilities" style="margin: 15px 0;">
                    <h3>Fasilitas:</h3>
                    <p>{{ $kos->facilities }}</p>
                </div>
                <div class="property-description" style="margin: 15px 0;">
                    <h3>Deskripsi:</h3>
                    <p>{{ $kos->description }}</p>
                </div>
                <div class="property-rules" style="margin: 15px 0;">
                    <h3>Peraturan Kos:</h3>
                    <p>{{ $kos->rules }}</p>
                </div>
                <div class="property-contact" style="margin: 15px 0;">
                    <h3>Kontak:</h3>
                    <p><i class="fas fa-phone"></i> {{ $kos->contact_person }}</p>
                </div>
                <div style="margin-top: 30px;">
                    <a href="#" class="btn-primary">Ajukan Sewa Sekarang</a>
                    <a href="{{ url()->previous() }}" class="btn-secondary" style="margin-left: 10px;">Kembali</a>
                </div>
            </div>
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