<p align="center">
  <img src="docs/logo.png" width="200" alt="Logo NeedKos" />
</p>

<h1 align="center">NeedKos</h1>
<h3 align="center">Platform Pencarian Kos Modern & Responsif</h3>

<p align="center">
  <em>NeedKos adalah platform web pencarian kos yang modern, cepat, dan ramah pengguna, terinspirasi dari layanan seperti Mamikos.</em><br />
  Dibangun dengan <strong>Laravel 10</strong>, <strong>TailwindCSS</strong>, dan <strong>Filament v3</strong> untuk memberikan pengalaman terbaik bagi penyewa dan pemilik kos.
</p>

<p align="center">
  <a href="https://github.com/kelvianov/Laravel-NeedKos/actions"><img src="https://img.shields.io/github/actions/workflow/status/kelvianov/Laravel-NeedKos/ci.yml?branch=main" alt="Build Status" /></a>
  <a href="https://github.com/kelvianov/Laravel-NeedKos/blob/main/LICENSE"><img src="https://img.shields.io/github/license/kelvianov/Laravel-NeedKos" alt="License" /></a>
  <a href="https://github.com/kelvianov/Laravel-NeedKos/issues"><img src="https://img.shields.io/github/issues/kelvianov/Laravel-NeedKos" alt="Issues" /></a>
</p>

---

## 🚀 Fitur Unggulan

- 🔍 **Pencarian Kos Interaktif**  
  Filter kos berdasarkan lokasi, harga, fasilitas, dan tipe kamar secara real-time.
- 🏠 **Detail Kos Lengkap**  
  Foto, deskripsi, fasilitas lengkap, dan peta lokasi terintegrasi.
- 👥 **Sistem Login & Registrasi Terpisah**  
  Akun untuk Pemilik Kos dan Penyewa dengan fitur keamanan yang ketat.
- 🔐 **Manajemen Hak Akses Berdasarkan Role**  
  Admin, Owner, dan Tenant memiliki dashboard dan akses fitur yang berbeda.
- 🧑‍💼 **Dashboard Profesional dengan Filament v3**  
  Mudah digunakan, efisien, dan powerful untuk pengelolaan kos.
- 🎨 **Desain Kustom dengan TailwindCSS & CSS**  
  Tampilan modern, responsif, dan mudah dikustomisasi.
- 🌙 **Dukungan Dark Mode**  
  Tampilan nyaman untuk pengguna malam hari.
- 📱 **Fully Responsive Design**  
  Optimal di semua ukuran layar dan perangkat.

---

## 🧰 Teknologi yang Digunakan

| Teknologi        | Link                                            |
|------------------|-------------------------------------------------|
| Laravel 10       | [https://laravel.com](https://laravel.com)      |
| TailwindCSS      | [https://tailwindcss.com](https://tailwindcss.com) |
| Filament v3      | [https://filamentphp.com](https://filamentphp.com) |
| Blade Templating | [https://laravel.com/docs/blade](https://laravel.com/docs/blade) |
| MySQL            | [https://www.mysql.com](https://www.mysql.com)  |
| JavaScript (Vanilla) | [https://developer.mozilla.org/en-US/docs/Web/JavaScript](https://developer.mozilla.org/en-US/docs/Web/JavaScript) |

---

## 🛠️ Instalasi & Setup Lokal

Ikuti langkah berikut untuk menjalankan aplikasi ini di lingkungan lokal:

```bash
# 1. Clone repository
git clone https://github.com/kelvianov/Laravel-NeedKos.git
cd Laravel-NeedKos

# 2. Install dependency backend
composer install

# 3. Install dependency frontend
npm install && npm run dev

# 4. Salin file konfigurasi environment
cp .env.example .env

# 5. Generate application key
php artisan key:generate

# 6. Sesuaikan konfigurasi database di file .env
# Contoh:
# DB_DATABASE=nama_database
# DB_USERNAME=user_database
# DB_PASSWORD=password_database

# 7. Migrasi database dan isi data awal (seed)
php artisan migrate --seed

# 8. Jalankan server lokal
php artisan serve
