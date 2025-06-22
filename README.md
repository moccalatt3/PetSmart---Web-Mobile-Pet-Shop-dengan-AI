# PetSmart: PLATFORM PET SHOP BERBASIS WEB DAN MOBILE DENGAN FITUR AI

## Deskripsi Proyek

**PetSmart** adalah platform pet shop berbasis **web dan mobile** yang dirancang untuk memudahkan pemilik hewan peliharaan dalam mengakses produk, layanan, dan solusi cepat terhadap permasalahan kesehatan hewan melalui fitur **Kecerdasan Buatan (AI)** sederhana.

Platform ini dikembangkan menggunakan metode **Agile** dan dilengkapi dengan antarmuka yang intuitif dan responsif, backend yang solid, serta sistem database yang mengelola data produk, pengguna, transaksi, dan hasil diagnosis.

---

## Fitur Utama

### Untuk Admin:
1. Melihat statistik jumlah pengguna, transaksi, dan layanan.
2. Mengetahui **produk top selling**.
3. Mengelola data:
    - Akun pengguna
    - Produk
    - Transaksi
    - Layanan
    - Konsultasi

### Untuk Pengguna:
1. Membeli produk secara langsung, dimasukkan ke keranjang, dan mencetak struk belanja.
2. Mengakses layanan/service hewan.
3. Melakukan konsultasi seputar hewan peliharaan.
4. Menggunakan fitur **AI Diagnosis** dengan pertanyaan interaktif untuk mengetahui gejala kesehatan hewan.

---

## Teknologi yang Digunakan

- **Laravel** (backend dan frontend web)
- **MySQL** (database)
- **HTML, CSS, JS** (frontend)
- **AI Sederhana** (rule-based diagnosis dan penyortiran produk)

---

## Tampilan Antarmuka

### Halaman Admin
Melihat statistik dan mengelola semua data platform.

![Admin Dashboard](public/img/admin.png)

---

### Halaman Login & Register

![Login](public/img/login.png)
![Register](public/img/register.png)

---

### Halaman Home

![Home](public/img/home.png)

---

### Halaman Layanan

![Service](public/img/layanan.png)

---

### Halaman Konsultasi / Chat

![Chat](public/img/chat.png)

---

### Halaman Diagnosis AI

![Diagnosis](public/img/diagnosis.png)

---

### Halaman Shop & Keranjang

![Shop](public/img/shop.png)

---

## Cara Menjalankan Proyek

### Langkah-langkah Setup

```bash
#1.Install dependency PHP
composer install

# 2. Salin file .env
cp .env.example .env

# 3. Generate key
php artisan key:generate

# 4. Jalankan migrasi database
php artisan migrate

# 5. Jalankan server lokal
php artisan serve

