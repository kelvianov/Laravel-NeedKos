@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
<div class="about-hero">
    <div class="container">
        <div class="about-hero-content">
            <h1>Tentang KosKu</h1>
            <p>Menghubungkan mahasiswa dan profesional muda dengan hunian berkualitas di seluruh Indonesia</p>
        </div>
    </div>
</div>

<div class="about-section">
    <div class="container">
        <div class="about-grid">
            <div class="about-content">
                <h2>Cerita Kami</h2>
                <p>Didirikan pada tahun 2025, KosKu lahir dari sebuah ide sederhana namun kuat: untuk mempermudah pencarian dan pemesanan hunian berkualitas bagi mahasiswa dan profesional muda di Indonesia.</p>
                <p>Berawal dari platform kecil, kini kami telah berkembang menjadi marketplace terpercaya yang menghubungkan ribuan pemilik kos dengan penyewa di seluruh negeri.</p>
            </div>
            <div class="about-image">
                <img src="{{ asset('images/modern-room.jpg') }}" alt="Cerita KosKu">
            </div>
        </div>
    </div>
</div>

<div class="mission-section">
    <div class="container">
        <div class="mission-grid">
            <div class="mission-card">
                <i class="fas fa-home"></i>
                <h3>Misi Kami</h3>
                <p>Menyediakan solusi hunian yang terjangkau, terpercaya, dan berkualitas untuk meningkatkan pengalaman tinggal pengguna kami.</p>
            </div>
            <div class="mission-card">
                <i class="fas fa-handshake"></i>
                <h3>Nilai-Nilai Kami</h3>
                <p>Kepercayaan, transparansi, dan kepuasan pengguna adalah inti dari setiap langkah kami.</p>
            </div>
            <div class="mission-card">
                <i class="fas fa-chart-line"></i>
                <h3>Visi Kami</h3>
                <p>Menjadi platform terpercaya nomor satu di Indonesia untuk mencari dan mengelola hunian berkualitas.</p>
            </div>
        </div>
    </div>
</div>

<div class="stats-section">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-card">
                <h3>10K+</h3>
                <p>Properti Terdaftar</p>
            </div>
            <div class="stat-card">
                <h3>50K+</h3>
                <p>Pengguna Puas</p>
            </div>
            <div class="stat-card">
                <h3>20+</h3>
                <p>Kota Terjangkau</p>
            </div>
            <div class="stat-card">
                <h3>100%</h3>
                <p>Transaksi Aman</p>
            </div>
        </div>
    </div>
</div>

<style>
.about-hero {
    background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ asset('images/modern-room.jpg') }}');
    background-size: cover;
    background-position: center;
    padding: 120px 0;
    color: white;
    text-align: center;
    margin-bottom: 64px;
}

.about-hero-content h1 {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 16px;
}

.about-hero-content p {
    font-size: 1.2rem;
    max-width: 600px;
    margin: 0 auto;
}

.about-section {
    padding: 64px 0;
}

.about-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 64px;
    align-items: center;
}

.about-content h2 {
    font-size: 2rem;
    font-weight: 600;
    margin-bottom: 24px;
    color: #222;
}

.about-content p {
    font-size: 1.1rem;
    line-height: 1.6;
    color: #666;
    margin-bottom: 16px;
}

.about-image img {
    width: 100%;
    border-radius: 8px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

.mission-section {
    background-color: #f8f9fa;
    padding: 64px 0;
}

.mission-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 32px;
}

.mission-card {
    background: white;
    padding: 32px;
    border-radius: 8px;
    text-align: center;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease;
}

.mission-card:hover {
    transform: translateY(-10px);
}

.mission-card i {
    font-size: 2.5rem;
    color: #222;
    margin-bottom: 16px;
}

.mission-card h3 {
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 16px;
    color: #222;
}

.mission-card p {
    color: #666;
    line-height: 1.6;
}

.stats-section {
    padding: 64px 0;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 32px;
}

.stat-card {
    text-align: center;
    padding: 24px;
}

.stat-card h3 {
    font-size: 2.5rem;
    font-weight: 700;
    color: #222;
    margin-bottom: 8px;
}

.stat-card p {
    color: #666;
    font-size: 1.1rem;
}

@media (max-width: 1024px) {
    .about-grid,
    .mission-grid {
        grid-template-columns: 1fr;
        gap: 32px;
    }

    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .about-hero {
        padding: 80px 0;
    }

    .about-hero-content h1 {
        font-size: 2.5rem;
    }

    .about-content h2 {
        font-size: 1.8rem;
    }

    .stats-grid {
        grid-template-columns: 1fr;
    }
}
</style>
@endsection
