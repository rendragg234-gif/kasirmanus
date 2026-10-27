<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];

    // Upload gambar
    $filename = $_FILES['img']['name'];
    $tmp_name = $_FILES['img']['tmp_name'];
    $folder = "uploads/";

    if (!file_exists($folder)) {
        mkdir($folder, 0777, true);
    }

    $path = $folder . basename($filename);

    if (move_uploaded_file($tmp_name, $path)) {
        // Simpan ke tabel tbl_menu
        $sql = "INSERT INTO tbl_menu (nama_menu, harga, gambar) VALUES ('$nama', '$harga', '$filename')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script>alert('Menu berhasil ditambahkan!'); window.location='menu.php';</script>";
        } else {
            echo "Gagal simpan ke database: " . mysqli_error($conn);
        }
    } else {
        echo "Upload gambar gagal!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Menu</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
body {
  margin: 0;
  font-family: 'Poppins', sans-serif;
  background: url('https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=1920&q=80') no-repeat center center/cover;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
}

.overlay {
  position: absolute;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,0.5);
  top: 0;
  left: 0;
  z-index: 1;
}

.container {
  position: relative;
  z-index: 2;
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(15px);
  border-radius: 20px;
  padding: 40px 50px;
  box-shadow: 0 8px 32px rgba(0,0,0,0.3);
  max-width: 600px;
  width: 100%;
  color: #fff;
}

.container h2 {
  text-align: center;
  font-size: 28px;
  font-weight: 700;
  margin-bottom: 25px;
}

label {
  font-weight: 600;
  display: block;
  margin: 12px 0 6px;
}

input[type="text"],
input[type="number"],
input[type="file"] {
  width: 100%;
  padding: 12px;
  border: none;
  border-radius: 12px;
  outline: none;
  margin-bottom: 15px;
  font-size: 14px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.2);
}

button {
  width: 100%;
  padding: 14px;
  border: none;
  border-radius: 12px;
  background: linear-gradient(135deg, #4e342e, #8d6e63);
  color: #fff;
  font-size: 16px;
  font-weight: bold;
  cursor: pointer;
  transition: all 0.3s ease;
  box-shadow: 0 6px 15px rgba(0,0,0,0.3);
}

button:hover {
  background: linear-gradient(135deg, #3e2723, #6d4c41);
  transform: translateY(-2px);
}


</style>
<body>
    <div class="form-card">
        <h2>🍵 Tambah Menu Baru</h2>
        <p>Isi data menu dengan lengkap agar bisa tampil di daftar menu café.</p>
        <form action="" method="POST" enctype="multipart/form-data">
            <label>Nama Menu</label>
            <input type="text" name="nama" required>

            <label>Harga</label>
            <input type="number" name="harga" required>

            <label>Gambar</label>
            <input type="file" name="img" required>

            <button type="submit" name="simpan" class="btn-submit">Simpan Menu</button>
        </form>
    </div>
</body>
</html>
