# Lab8Web
# Nama : Fitri Ramadhani
# NIM : 312410085
# Kelas : TI.24.A.1
# Mata Kuliah : Pemrograman Web 1 (Tugas Pert-10)
# Dosen Pengampu : Agung Nugroho, S.Kom., M.Kom.

# Aplikasi Manajemen Data dengan PHP dan MySQL

Aplikasi web sederhana untuk mengelola data menggunakan PHP dan MySQL. Aplikasi ini memungkinkan pengguna untuk melihat, menambah, dan mengubah data yang tersimpan dalam database.

## Fitur

- Menampilkan daftar data
- Menambahkan data baru
- Mengubah data yang sudah ada
- Antarmuka pengguna yang responsif
- Koneksi database yang aman

## Persyaratan Sistem

- XAMPP (PHP 7.4+)
- MySQL 5.7+
- Web browser modern

## Instalasi

1. Clone repositori ini ke dalam folder `htdocs` XAMPP:
   ```
   git clone [URL_REPOSITORY] lab8_php_database
   ```

2. Buat database baru di phpMyAdmin 
   
3. Sesuaikan konfigurasi koneksi database di file `koneksi.php`

## Struktur File

- `index.php` - Halaman utama yang menampilkan daftar data
- `tambah.php` - Halaman untuk menambahkan data baru
- `ubah.php` - Halaman untuk mengubah data yang sudah ada
- `koneksi.php` - File konfigurasi koneksi database

## Penggunaan

1. Akses aplikasi melalui browser:
   ```
   http://localhost/lab8_php_database
   ```

2. Untuk menambahkan data baru:
   - Klik tombol "Tambah Data"
   - Isi form yang tersedia
   - Klik "Simpan"

3. Untuk mengubah data:
   - Klik tombol "Ubah" pada data yang ingin diubah
   - Perbarui data yang diinginkan
   - Klik "Simpan Perubahan"

## Kontribusi

1. Fork repositori ini
2. Buat branch untuk fitur baru (`git checkout -b fitur-baru`)
3. Commit perubahan Anda (`git commit -am 'Menambahkan fitur baru'`)
4. Push ke branch (`git push origin fitur-baru`)
5. Buat Pull Request
