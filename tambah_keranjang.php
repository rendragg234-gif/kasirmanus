<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $item = [
        'nama' => $_POST['nama'],
        'meja' => $_POST['meja'],
        'id_menu' => $_POST['id_menu'],
        'nama_menu' => $_POST['nama_menu'],
        'harga' => $_POST['harga'],
        'jumlah' => $_POST['jumlah'],
        'gambar' => $_POST['gambar'],
        'total' => $_POST['harga'] * $_POST['jumlah']
    ];

    $_SESSION['keranjang'][] = $item;

    header("Location: keranjang.php");
    exit;
}
?>
