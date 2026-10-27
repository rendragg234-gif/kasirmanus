<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // hapus gambar dulu
    $result = mysqli_query($conn, "SELECT img FROM tbl_menu WHERE id='$id'");
    $data = mysqli_fetch_assoc($result);
    if ($data && file_exists("uploads/".$data['img'])) {
        unlink("uploads/".$data['img']);
    }

    // hapus data dari tabel
    $delete = mysqli_query($conn, "DELETE FROM tbl_menu WHERE id='$id'");

    if ($delete) {
        header("Location: menu.php");
        exit;
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
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
            background: #f9f3ef;
            padding: 30px;
        }
        .form-container {
            max-width: 400px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }
        h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        input[type="text"], input[type="number"], input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        button {
            background: #6b4226;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background: #4e2f1c;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Edit Menu</h2>
        <form method="post" enctype="multipart/form-data">
            <label>Nama Menu</label>
            <input type="text" name="nama_menu" value="<?php echo $row['nama_menu']; ?>" required>
            
            <label>Harga</label>
            <input type="number" name="harga" value="<?php echo $row['harga']; ?>" required>
            
            <label>Gambar (kosongkan jika tidak diganti)</label>
            <input type="file" name="gambar">
            
            <button type="submit" name="update">Update</button>
        </form>
    </div>
</body>
</html>
