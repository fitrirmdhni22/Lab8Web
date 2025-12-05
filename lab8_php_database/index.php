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