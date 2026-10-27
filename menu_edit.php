<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM tbl_menu WHERE id='$id'");
    $data = mysqli_fetch_assoc($result);
    if (!$data) {
        echo "Data tidak ditemukan!";
        exit;
    }
} else {
    echo "ID tidak ada!";
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Menu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }
        .form-container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        h2 { text-align: center; margin-bottom: 20px; }
        input, select {
            width: 100%; padding: 10px; margin: 8px 0;
            border: 1px solid #ccc; border-radius: 5px;
        }
        button {
            background: #6f4e37; color: white;
            border: none; padding: 10px 15px;
            border-radius: 5px; cursor: pointer;
        }
        button:hover { background: #54382a; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Edit Menu</h2>
        <form action="update_menu.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $data['id']; ?>">

            <label>Nama Menu:</label>
            <input type="text" name="nama_menu" value="<?= $data['nama_menu']; ?>" required>

            <label>Harga:</label>
            <input type="number" name="harga" value="<?= $data['harga']; ?>" required>

            <label>Kategori:</label>
            <input type="text" name="id_kategori" value="<?= $data['id_kategori']; ?>">

            <label>Gambar Lama:</label><br>
            <img src="uploads/<?= $data['img']; ?>" width="100"><br><br>

            <label>Ganti Gambar:</label>
            <input type="file" name="img">

            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
