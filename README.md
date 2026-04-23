## Pegawai App

Aplikasi manajemen data pegawai berbasis web yang dibangun menggunakan framework Laravel.
Aplikasi ini memungkinkan pengelolaan data pegawai seperti tambah, edit, hapus, dan melihat daftar pegawai.

## Cara Menjalankan Project

Ikuti langkah-langkah berikut untuk menjalankan aplikasi di lokal:

1. Clone Repository

- git clone https://github.com/ridhoakbarsyah23/pegawai-app.git

2. Install Dependency

- composer install

3. Setup Environment
   Copy file .env.example menjadi .env, lalu sesuaikan konfigurasi database:

- cp .env.example .env

Generate key: (Bila diperlukan)

- php artisan key:generate

4. Migrasi & Seeder Database

- php artisan migrate --seed

5. Jalankan Server

- php artisan serve

## Login Default

Gunakan akun berikut untuk login:

Email: admin@gmail.com
Password: 123456

## Fitur Utama

- Login & Authentication
- Manajemen Data Pegawai
- Relasi data (Jabatan, Golongan, Eselon, dll)
- CRUD (Create, Read, Update, Delete)
- Tampilan modern dengan Tailwind CSS

## Teknologi yang Digunakan

- Laravel Framework
- MySQL Database
- Tailwind CSS
- Blade Templating Engine

## Kontribusi

Jika Anda ingin berkontribusi pada proyek ini, silakan fork repository dan buat pull request
