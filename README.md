# parfum

# FIFA Fragrance — Luxury Botanical Perfumes E-Commerce

Platform e-commerce wewangian mewah dan parfum botani alami terinspirasi dari keanggunan alam. Dilengkapi katalog parfum pria, parfum wanita, dan discovery sets dengan piramida aroma lengkap (Top, Heart, Base notes), gambar produk berlatar belakang transparan, serta sistem interaktif keranjang belanja, ulasan produk, dan asisten AI virtual.

---

## 🌟 Fitur Utama

- **Katalog Parfum Mewah**: Eau de Parfum (EDP) dan Extrait de Parfum dengan detail piramida aroma (*Top Notes*, *Heart Notes*, *Base Notes*), konsentrasi, sillage, dan ketahanan wangi.
- **Visual Produk Premium**: Aset foto produk parfum dengan latar belakang transparan (PNG).
- **Brand Identity**: Tetap mengusung nama dan logo **fifa** dengan identitas elegan bernuansa minimalis netral.
- **Kategori & Taksonomi**:
  - *Parfum Pria* (Fresh Aquatic, Woody Amber, Spicy Aromatic, Leather Oud)
  - *Parfum Wanita* (Floral Bouquet, Vanilla Gourmand, Rose Velvet, Citrus Bloom)
  - *Discovery Sets* (Travel Size & Scent Sampler Gift Sets)
- **Asisten fifa (AI Chatbot)**: Konsultasi aroma otomatis, rekomendasi wewangian berdasarkan karakter, tips ketahanan, dan informasi pengiriman.
- **Filter & Interaktivitas**: Filter menurut ukuran botol (*30ml, 50ml, 100ml, 5x10ml*), keluarga aroma (*Olfactive Family*), dan rentang harga.
- **Sistem Checkout & Garansi**: Kalkulator gratis ongkir otomatis, notifikasi pengiriman botol aman, dan manajemen pesanan.

---

## 🚀 Panduan Instalasi & Menjalankan Aplikasi

### 1. Prasyarat
- PHP >= 8.2
- Composer
- MySQL 8.0+
- Node.js & NPM

### 2. Konfigurasi Database & Environment
Salin berkas `.env.example` ke `.env` (atau gunakan `.env` yang sudah tersedia):

```env
APP_NAME="FIFA Fragrance"
APP_ENV=local
APP_KEY=base64:...
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=parfum
DB_USERNAME=root
DB_PASSWORD=
```

### 3. Migrasi & Seeding Data Parfum
Jalankan migrasi dan seeder untuk menginisialisasi database `parfum` beserta katalog wewangian:

```bash
php artisan migrate:fresh --seed
```

### 4. Menjalankan Server Lokal
```bash
php artisan serve
```
Aplikasi dapat diakses di: `http://127.0.0.1:8000`

---

## 📂 Struktur Database Utama
- `categories`: Taksonomi wewangian (Parfum Pria, Parfum Wanita, Discovery Sets).
- `products`: Informasi produk, aroma notes, konsentrasi, volume, dan galeri gambar transparan.
- `site_settings`: Pengaturan toko, ambang batas gratis ongkir, dan pengumuman.
- `hero_slides`: B Handle slide dan banner promosi beranda.
- `posts`: Jurnal & artikel edukasi seputar olfactive notes dan bahan botani.

---

## 🛡️ Lisensi
Hak Cipta © 2026 **fifa Fragrance**. Seluruh hak cipta dilindungi undang-undang.
