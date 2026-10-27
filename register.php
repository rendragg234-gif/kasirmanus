<?php
session_start();
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Cek apakah password sama dengan konfirmasi password
    if ($password !== $confirm_password) {
        echo "<script>alert('Password dan Konfirmasi Password tidak sama!');</script>";
    } else {
        // Cek apakah username sudah ada
        $checkUser = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $checkUser);

        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Username sudah terdaftar, silakan pilih yang lain.');</script>";
        } else {
            // Insert user baru
            $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Pendaftaran berhasil! Silakan login.'); window.location='login.php';</script>";
            } else {
                echo "<script>alert('Terjadi kesalahan, coba lagi.');</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Penjual</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .register-box {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 8px 20px rgba(0,0,0,0.2);
            width: 350px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #000;
        }
        input {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border-radius: 10px;
            border: 1px solid #ccc;
            background: #f0f6ff;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #4a4de7;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            margin-top: 10px;
        }
        button:hover {
            background: #333bd1;
        }
        .link {
            display: block;
            margin-top: 12px;
            color: #4a4de7;
            text-decoration: none;
            font-size: 14px;
        }
        .link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="register-box">
        <h2>Daftar Akun Penjual</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Konfirmasi Password" required>
            <button type="submit">Daftar</button>
        </form>
        
        <a href="login.php" class="link">← Kembali ke Login</a>
    </div>
</body>
</html>
