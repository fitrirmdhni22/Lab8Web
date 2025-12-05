# Lab8Web
# Nama : Fitri Ramadhani
# NIM : 312410085
# Kelas : TI.24.A.1
# Mata Kuliah : Pemrograman Web 1 (Tugas Pert-10)
# Dosen Pengampu : Agung Nugroho, S.Kom., M.Kom.

# Aplikasi web sederhana berbasis PHP & MySQL untuk manajemen data barang. 
# Pengguna bisa melihat daftar barang, menambah data baru, memperbaharui data, dan menghapus barang dari basis data.

# Membuat Database
```PHP
CREATE DATABASE latihan1;
```

# Membuat Tabel
```PHP
CREATE TABLE data_barang (
id_barang int(10) auto_increment Primary Key,
kategori varchar(30),
nama varchar(30),
gambar varchar(100),
harga_beli decimal(10,0),
harga_jual decimal(10,0),
stok int(4)
);
```

# Menambahkan Data
```PHP
INSERT INTO data_barang (kategori, nama, gambar, harga_beli, harga_jual, stok)
VALUES ('Elektronik', 'HP Samsung Android', 'hp_samsung.jpg', 2000000, 2400000, 5),
('Elektronik', 'HP Xiaomi Android', 'hp_xiaomi.jpg', 1000000, 1400000, 5),
('Elektronik', 'HP OPPO Android', 'hp_oppo.jpg', 1800000, 2300000, 5);
```
# Membuat file koneksi database
# Buat file baru dengan nama koneksi.php
```PHP
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "latihan1";

$conn = mysqli_connect($host, $user, $pass, $db);
if ($conn == false)
{
    echo "Koneksi ke server gagal.";
    die();
} else echo "Koneksi berhasil";
?>
```

# Tampilan Output
<img width="448" height="131" alt="image" src="https://github.com/user-attachments/assets/f371cbfc-dd14-4bfe-894a-cf50b21bb4a6" />

# Membuat file index untuk menampilkan data (Read)
# Buat file baru dengan nama index.php
```PHP
<?php
include("koneksi.php");

// Query untuk menampilkan data
$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Data Barang</h1>
            <a href="tambah.php" class="btn-tambah">
                <i class="fas fa-plus"></i> Tambah Barang
            </a>
        </header>
        
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Harga Jual</th>
                        <th>Harga Beli</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($result && mysqli_num_rows($result) > 0): ?>
                    <?php while($row = mysqli_fetch_array($result)): 
                        // Tentukan kelas stok berdasarkan jumlah
                        if ($row['stok'] >= 5) {
                            $stok_class = "stok-tinggi";
                        } elseif ($row['stok'] >= 2) {
                            $stok_class = "stok-sedang";
                        } else {
                            $stok_class = "stok-rendah";
                        }
                    ?>
                    <tr>
                        <td>
                            <img src="gambar/<?= $row['gambar']; ?>" alt="<?= $row['nama']; ?>" class="gambar-barang">
                        </td>
                        <td><?= $row['nama']; ?></td>
                        <td><span class="kategori"><?= $row['kategori']; ?></span></td>
                        <td class="harga harga-jual">Rp <?= number_format($row['harga_jual'], 0, ',', '.'); ?></td>
                        <td class="harga harga-beli">Rp <?= number_format($row['harga_beli'], 0, ',', '.'); ?></td>
                        <td><span class="stok <?= $stok_class; ?>"><?= $row['stok']; ?></span></td>
                        <td>
                            <div class="aksi-container">
                                <a href="ubah.php?id=<?= $row['id_barang']; ?>" class="btn-ubah">
                                    <i class="fas fa-edit"></i> Ubah
                                </a>
                                <a href="hapus.php?id=<?= $row['id_barang']; ?>" class="btn-hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="7" class="no-data">Belum ada data</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php
// Tutup koneksi
mysqli_close($conn);
?>
```

# Tampilan Output
<img width="1366" height="659" alt="image" src="https://github.com/user-attachments/assets/f5c58325-085d-4b3f-8c6b-2680d7ba54e3" />

# Menambah Data (Create)
# Tampilan Output
<img width="1329" height="678" alt="image" src="https://github.com/user-attachments/assets/ff72321e-0e59-421a-a64b-60bc4af80ec7" />

# Mengubah Data (Update)
# Tampilan Output
<img width="1366" height="687" alt="image" src="https://github.com/user-attachments/assets/e890230f-654a-41cb-9920-02507ab1e698" />

# Menghapus Data (Delete)
# Tampilan Output
<img width="1361" height="595" alt="image" src="https://github.com/user-attachments/assets/d7bc0e40-f470-4914-9320-cb3ae1029efd" />

# File ini digunakan untuk menghubungkan aplikasi PHP dengan database MySQL.

# Fungsionalitas & Alur Halaman

# 1. Read (index.php)
# Menampilkan seluruh data di tabel data_barang dalam bentuk tabel HTML yang mencakup: Gambar, Nama Barang, Kategori, Harga Beli, Harga Jual, Stok, dan Aksi (Ubah / Hapus).

# 2. Create (tambah.php)
# Menyediakan form untuk menambahkan barang baru ke database.

# 3. Update (ubah.php)
# Membuka form yang sudah terisi data lama untuk memungkinkan perubahan data barang tertentu.

# 4. Delete (hapus.php)
# Menghapus data barang berdasarkan id_barang dengan konfirmasi dari pengguna.

# 🎨 Tampilan Antarmuka

# - File CSS dan ikon (Font Awesome) digunakan untuk mempercantik tampilan.

# - Harga diformat dalam mata uang Rupiah, stok diberi kelas untuk membedakan level stok (tinggi, sedang, rendah).

# Jika tidak ada data, tabel menampilkan baris “Belum ada data”.

# ✅ Cara Menjalankan

# 1. Pastikan server web (misalnya Apache) dan MySQL aktif.

# 2. Import database & struktur tabel seperti dijelaskan di atas.

# 3. Tempatkan semua file PHP & folder gambar sesuai struktur repo.

# 4. Akses index.php di browser untuk mulai menggunakan aplikasi.

# Terima Kasih
