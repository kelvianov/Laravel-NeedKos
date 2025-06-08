<p align="center">
  <img src="https://raw.githubusercontent.com/MPI/needkos/main/public/images/logo.png" width="200" alt="Logo NeedKos">
</p>

<h2 align="center">NeedKos – Platform Pencarian Kos Modern & Responsif</h2>

<p align="center">
  NeedKos adalah platform web pencarian kos yang modern, cepat, dan ramah pengguna, terinspirasi dari layanan seperti Mamikos.<br>
  Dibangun dengan <strong>Laravel 10</strong>, <strong>TailwindCSS</strong>, dan <strong>Filament v3</strong> untuk memberikan pengalaman terbaik bagi penyewa dan pemilik kos.
</p>

---

## ✨ Fitur Unggulan

- 🔍 **Pencarian Kos Interaktif** – Filter berdasarkan lokasi, harga, fasilitas, dan tipe kamar
- 🏠 **Detail Kos Lengkap** – Menampilkan foto, deskripsi, fasilitas, dan peta lokasi
- 👥 **Sistem Login & Registrasi** – Terpisah untuk Pemilik dan Penyewa
- 🔐 **Akses Berdasarkan Role** – Admin, Owner, dan Tenant memiliki hak akses berbeda
- 🧑‍💼 **Dashboard Filament** – Untuk Admin dan Pemilik Kos, mudah digunakan dan profesional
- 🎨 **Desain Kustom CSS + Tailwind** – Fleksibel dan mudah disesuaikan
- 🌙 **Dark Mode** – Tampilan elegan dan nyaman di malam hari
- 📱 **Responsive Design** – Tampilan optimal di desktop maupun mobile

---

## 🧰 Teknologi yang Digunakan

- ⚙️ [Laravel 10](https://laravel.com)
- 🎨 [TailwindCSS](https://tailwindcss.com)
- 🎯 **CSS Kustom** – Untuk styling tambahan di luar Tailwind
- 🧩 [Filament v3](https://filamentphp.com)
- 🖋️ [Blade Templating](https://laravel.com/docs/blade)
- 🗃️ [MySQL](https://www.mysql.com)
- ⚡ [JavaScript (Vanilla)](https://developer.mozilla.org/en-US/docs/Web/JavaScript)

---

## 🛠️ Instalasi Lokal

```bash
# Clone repository
git clone https://github.com/USERNAME/needkos.git
cd needkos

# Install dependency backend
composer install

# Install dependency frontend
npm install && npm run dev

# Salin dan konfigurasi file .env
cp .env.example .env
php artisan key:generate

# Buat dan migrasi database
php artisan migrate --seed

# Jalankan server lokal
php artisan serve
