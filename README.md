# 📊 Dashboard Penjualan Laravel

Aplikasi ini dibuat sebagai bagian dari **Tes Kandidat IT Rumah Mesin – Pembuatan Dashboard Penjualan**.  
Tujuannya adalah menampilkan **laporan penjualan** menggunakan framework **Laravel 12.0**, dilengkapi dengan visualisasi data menggunakan **Chart.js**.
Seluruh tampilan dibuat dengan **Bootstrap 5** agar responsif dan mudah digunakan.

---

## 🚀 Fitur Utama

| Fitur | Deskripsi |
|-------|-----------|
| 📋 **Tabel Penjualan** | Menampilkan data penjualan produk (nama, tanggal, jumlah, harga, total). |
| 💰 **Total Penjualan Otomatis** | Menghitung total pendapatan dari seluruh transaksi. |
| 📊 **Grafik Penjualan (Chart.js)** | Visualisasi tren penjualan berdasarkan tanggal. |
| 🗓️ **Filter Rentang Tanggal** | Menyaring data berdasarkan tanggal awal dan akhir. |
| 📈 **Statistik Tambahan** | Menampilkan total item terjual, rata-rata harga, dan rentang data. |
| 🎨 **UI Modern & Responsif** | Menggunakan Bootstrap 5 dengan tampilan card dan layout rapi. |

---

## 🧰 Teknologi yang Digunakan

- **Laravel 12.0**
- **PHP 8.4+**
- **MySQL / SQLite**
- **Chart.js (v4)** untuk visualisasi grafik
- **Bootstrap 5** untuk antarmuka modern

---

Hasil Deployment :
[Klik link ini](https://dashboardrumahmesin-production.up.railway.app/)

## ⚙️ Cara Instalasi dan Setup

Berikut panduan lengkap untuk menjalankan project ini secara lokal (Laragon / XAMPP):

### 
```bash
1️⃣ Clone Repository
git clone https://github.com/USERNAME/dashboard-penjualan.git
cd dashboard-penjualan

2️⃣ Install Dependencies
composer install

3️⃣ Buat File .env

Salin file .env.example menjadi .env, kemudian sesuaikan konfigurasi berikut:

APP_NAME=DashboardPenjualan
APP_ENV=local
APP_KEY= (isi nanti dengan php artisan key:generate)
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_penjualan
DB_USERNAME=root
DB_PASSWORD=

TIMEZONE=Asia/Jakarta


Tambahkan konfigurasi lain jika diperlukan, misal mail, cache, queue, dll.

4️⃣ Buat Database

Masuk ke phpMyAdmin (Laragon/XAMPP)

Buat database baru bernama: db_penjualan

5️⃣ Jalankan Migration & Seeder
php artisan migrate --seed

6️⃣ Atur Route Default

Buka routes/web.php dan ubah menjadi:

use App\Http\Controllers\PenjualanController;

Route::get('/dashboard', [PenjualanController::class, 'index'])->name('dashboard');


Pastikan route default / langsung menuju dashboard.

7️⃣ Jalankan Server Laravel
php artisan serve


Buka browser → http://127.0.0.1:8000/dashboard

Halaman langsung menuju Dashboard Penjualan.

