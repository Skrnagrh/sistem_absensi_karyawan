# Sistem Absensi Karyawan

Sistem Absensi Karyawan adalah aplikasi berbasis web yang dikembangkan menggunakan [framework Laravel](https://laravel.com/) untuk manajemen absensi karyawan. Aplikasi ini memudahkan pengelolaan kehadiran dan pelaporan absensi.

## Tampilan Aplikasi

| <img src="https://github.com/Skrnagrh/delphi_aplikasi_perpustakaan/raw/main/1.Tampilan/1.png" alt="Tampilan 1" width="70%"> | <img src="https://github.com/Skrnagrh/delphi_aplikasi_perpustakaan/raw/main/1.Tampilan/2.png" alt="Tampilan 2" width="70%"> |
|:---:|:---:|
| Halaman Utama | Halaman Data Anggota |

| <img src="https://github.com/Skrnagrh/delphi_aplikasi_perpustakaan/raw/main/1.Tampilan/3.png" alt="Tampilan 3" width="570%"> | <img src="https://github.com/Skrnagrh/delphi_aplikasi_perpustakaan/raw/main/1.Tampilan/4.png" alt="Tampilan 4" width="70%"> |
|:---:|:---:|
| Halaman Data Buku | Halaman Data Peminjaman |

| <img src="https://github.com/Skrnagrh/delphi_aplikasi_perpustakaan/raw/main/1.Tampilan/5.png" alt="Tampilan 5" width="70%"> | 
|:---:|
| Cara Konfigurasi Database |

## Fitur

- Pendaftaran Karyawan
- Pencatatan Absensi
- Laporan Absensi
- Kelola Data Jabatan
- Kelola Data Posisi Jabatan
- Dashboard Interaktif
- Dan masih banyak lagi...

## Persyaratan

- PHP >= 8.0
- Composer
- Laravel >= 9.x
- MySQL atau Database Lainnya

## Panduan Instalasi

1. Clone repositori ini ke komputer Anda:

   ```bash
   git clone https://github.com/Skrnagrh/sistem_absensi_karyawan.git
   ```

2. Masuk ke direktori proyek:

   ```bash
   cd sistem_absensi_karyawan
   ```

3. Salin file `.env.example` menjadi `.env`:

   ```bash
   cp .env.example .env
   ```

4. Konfigurasi file `.env` sesuai dengan pengaturan database Anda.

5. Jalankan perintah berikut untuk menginstal dependensi:

   ```bash
   composer install
   ```

6. Jalankan perintah berikut untuk menghasilkan kunci aplikasi:

   ```bash
   php artisan key:generate
   ```

7. Migrasikan dan isi database Anda dengan data awal:

   ```bash
   php artisan migrate --seed
   ```

8. Jalankan server pengembangan:

   ```bash
   php artisan serve
   ```

9. Buka aplikasi di browser Anda dengan mengunjungi `http://localhost:8000`.
