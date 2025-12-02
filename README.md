# 📊 Dashboard Penjualan Laravel

Aplikasi ini dibuat sebagai bagian dari **Tes Kandidat IT – Pembuatan Dashboard Penjualan**.  
Tujuannya adalah menampilkan **laporan penjualan** menggunakan framework **Laravel 10**, dilengkapi dengan visualisasi data menggunakan **Chart.js**, serta kemampuan **ekspor laporan ke PDF**.  
Seluruh tampilan dibuat dengan **Bootstrap 5** agar responsif dan mudah digunakan.

---

## 🚀 Fitur Utama

| Fitur | Deskripsi |
|-------|------------|
| 📋 **Tabel Penjualan** | Menampilkan data penjualan produk (nama, tanggal, jumlah, harga, total). |
| 💰 **Total Penjualan Otomatis** | Menghitung total pendapatan dari seluruh transaksi. |
| 📊 **Grafik Penjualan (Chart.js)** | Visualisasi tren penjualan berdasarkan tanggal. |
| 🗓️ **Filter Rentang Tanggal** | Menyaring data berdasarkan tanggal awal dan akhir. |
| 📈 **Statistik Tambahan** | Menampilkan total item terjual, rata-rata harga, dan rentang data. |
| 🧾 **Export PDF** | Mengunduh laporan penjualan dalam format PDF. |
| 🎨 **UI Modern & Responsif** | Menggunakan Bootstrap 5 dengan tampilan card dan layout rapi. |

---

## 🧰 Teknologi yang Digunakan

- **Laravel 10.x**
- **PHP 8.2+**
- **MySQL / SQLite**
- **Chart.js (v4)** untuk visualisasi grafik
- **Bootstrap 5** untuk antarmuka modern

---

## ⚙️ Cara Instalasi (Lokal via Laragon / XAMPP)

### 1️⃣ Clone Repository
```bash
git clone https://github.com/USERNAME/dashboard-penjualan.git
cd dashboard-penjualan

2️⃣ Install Dependencies
composer install

3️⃣ Buat File .env
APP_NAME=DashboardPenjualan
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

LOG_CHANNEL=stack
LOG_LEVEL=debug

# -----------------------------
# DATABASE CONFIGURATION
# -----------------------------
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_penjualan
DB_USERNAME=root
DB_PASSWORD=

# -----------------------------
# OTHER CONFIG
# -----------------------------
BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

# -----------------------------
# MAIL (Optional)
# -----------------------------
MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="noreply@example.com"
MAIL_FROM_NAME="${APP_NAME}"

# -----------------------------
# APP SETTINGS
# -----------------------------
TIMEZONE=Asia/Jakarta

4️⃣ Buat Database

Masuk ke phpMyAdmin (Laragon / XAMPP) *Rekomendasi Laragon
➡️ Buat database baru bernama db_penjualan

5️⃣ Jalankan Migration & Seeder
php artisan migrate --seed

6️⃣ Jalankan Server Laravel
php artisan serve
