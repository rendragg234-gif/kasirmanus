<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id         = $_POST['id'];
    $nama_menu  = $_POST['nama_menu'];
    $harga      = $_POST['harga'];
    $id_kategori= $_POST['id_kategori'];

    // Ambil data lama
    $result = mysqli_query($conn, "SELECT img FROM tbl_menu WHERE id='$id'");
    $data   = mysqli_fetch_assoc($result);
    $gambarLama = $data['img'];

    // Cek apakah ada upload gambar baru
    if ($_FILES['img']['name'] != '') {
        $imgName = time() . "_" . $_FILES['img']['name'];
        $tmpName = $_FILES['img']['tmp_name'];
        move_uploaded_file($tmpName, "uploads/" . $imgName);

        // Hapus gambar lama
        if (file_exists("uploads/" . $gambarLama)) {
            unlink("uploads/" . $gambarLama);
        }
    } else {
        $imgName = $gambarLama; // tetap pakai gambar lama
    }

    // Update data
    $query = "UPDATE tbl_menu SET 
                nama_menu='$nama_menu',
                harga='$harga',
                id_kategori='$id_kategori',
                img='$imgName'
              WHERE id='$id'";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Data berhasil diperbarui!');
                window.location.href='menu.php';
              </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
