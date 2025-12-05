<?php
error_reporting(E_ALL);
include_once 'koneksi.php';
if (isset($_POST['submit']))
{
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];
    $file_gambar = $_FILES['file_gambar'];
    $gambar = null;
    if ($file_gambar['error'] == 0)
    {
        $filename = str_replace(' ', '_',$file_gambar['name']);
        $destination = dirname(__FILE__) .'/gambar/' . $filename;
        if(move_uploaded_file($file_gambar['tmp_name'], $destination))
        {
            $gambar = 'gambar/' . $filename;;
        }
    }
    $sql = 'INSERT INTO data_barang (nama, kategori,harga_jual, harga_beli, stok, gambar) ';
    $sql .= "VALUE ('{$nama}', '{$kategori}','{$harga_jual}', '{$harga_beli}', '{$stok}', '{$gambar}')";
    $result = mysqli_query($conn, $sql);
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Tambah Barang</title>
</head>
<body>
<div class="container">
    <header>
        <h1>Tambah Barang</h1>
        <a href="index.php" class="btn-tambah" style="background-color: #7f8c8d;">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </header>
    
    <div class="form-container">
        <form method="post" action="tambah.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Nama Barang</label>
                <input type="text" id="nama" name="nama" required />
            </div>
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select id="kategori" name="kategori" required>
                    <option value="Komputer">Komputer</option>
                    <option value="Elektronik">Elektronik</option>
                    <option value="Hand Phone">Hand Phone</option>
                </select>
            </div>
            <div class="form-group">
                <label for="harga_jual">Harga Jual</label>
                <input type="number" id="harga_jual" name="harga_jual" required />
            </div>
            <div class="form-group">
                <label for="harga_beli">Harga Beli</label>
                <input type="number" id="harga_beli" name="harga_beli" required />
            </div>
            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" id="stok" name="stok" required />
            </div>
            <div class="form-group">
                <label for="file_gambar">File Gambar</label>
                <input type="file" id="file_gambar" name="file_gambar" accept="image/*" required />
            </div>
            <div class="form-actions">
                <button type="submit" name="submit" class="btn-tambah">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="index.php" class="btn-hapus">
                    <i class="fas fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
</body>
</html>