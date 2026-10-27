<?php
$host = "localhost";
$user = "root"; // default user XAMPP
$pass = "";     // default password XAMPP (kosong)
$db   = "db_tugas"; // nama database kamu

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
