<?php
include 'koneksi.php';
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM tbl_menu WHERE id='$id'");
    $menu = mysqli_fetch_assoc($result);
}
?>

<link rel="stylesheet" href="style.css">
<style>
    /* style.css */
body {
    font-family: Arial, sans-serif;
    background: #f6f0e3; /* tema coffee shop */
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.container {
    background: #fff;
    padding: 25px 30px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    max-width: 400px;
    width: 100%;
}

h2 {
    text-align: center;
    color: #6b4c3b;
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    color: #6b4226;
}

input[type="text"],
input[type="number"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-size: 14px;
    box-sizing: border-box;
}

input:focus {
    border-color: #6b4226;
    outline: none;
}

.btn {
    display: inline-block;
    width: 100%;
    text-align: center;
    background: #6b4226;
    color: #fff;
    padding: 12px;
    border: none;
    border-radius: 6px;
    font-size: 16px;
    cursor: pointer;
    transition: background 0.3s ease;
}

.btn:hover {
    background: #4e2f1c;
}

</style>


<div class="container">
    <h2>Form Pemesanan</h2>
    <form method="POST" action="tambah_keranjang.php">
        <input type="hidden" name="id_menu" value="<?= $menu['id']; ?>">
        <input type="hidden" name="nama_menu" value="<?= $menu['nama_menu']; ?>">
        <input type="hidden" name="harga" value="<?= $menu['harga']; ?>">
        <input type="hidden" name="gambar" value="<?= $menu['img']; ?>">

        <label>Nama Pembeli:</label>
        <input type="text" name="nama" required>

        <label>No Meja:</label>
        <input type="text" name="meja" required>

        <label>Menu:</label>
        <input type="text" value="<?= $menu['nama_menu']; ?>" readonly>

        <label>Harga:</label>
        <input type="text" value="Rp <?= number_format($menu['harga'],0,',','.'); ?>" readonly>

        <label>Jumlah:</label>
        <input type="number" name="jumlah" value="1" min="1" required>
        
        <button type="submit" class="btn">Pesan</button>
    </form>
</div>
