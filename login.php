<?php
session_start();
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // cek user + role
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // simpan ke session
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role']; // admin / pembeli

        

        // flag khusus admin
        if ($user['role'] === 'admin') {
            $_SESSION['is_admin'] = true;
        } else {
            $_SESSION['is_admin'] = false;
        }
        
        header("Location: menu.php");
        exit();
    } else {
        echo "<script>alert('Username atau Password salah!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Penjual</title>
    <style>
       body {
      margin: 0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Poppins', sans-serif;
      background: url('https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=1920&q=80') no-repeat center center/cover;
    }

    .overlay {
      position: absolute;
      width: 100%;
      height: 100%;
      background: rgba(0,0,0,0.5); /* efek gelap biar teks lebih jelas */
      top: 0;
      left: 0;
      z-index: 1;
    }

    .login-box {
      position: relative;
      z-index: 2;
      background: rgba(255, 255, 255, 0.12);
      backdrop-filter: blur(15px);
      border-radius: 20px;
      padding: 40px 60px;
      text-align: center;
      color: #fff;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
      animation: fadeIn 1s ease-in-out;
    }

    .login-box h2 {
      font-size: 30px;
      font-weight: 700;
      margin-bottom: 25px;
      letter-spacing: 1px;
      color: #fff;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 12px;
      margin: 8px 0;
      border: none;
      border-radius: 10px;
      outline: none;
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
      margin-top: 12px;
      box-shadow: 0 6px 15px rgba(0,0,0,0.3);
    }

    button:hover {
      background: linear-gradient(135deg, #3e2723, #6d4c41);
      transform: translateY(-2px);
    }

    .links {
      margin-top: 18px;
      text-align: center;
      font-size: 14px;
      color: #fff;
    }

    .links a {
      color: #ffcc80;  /* warna latte */
      font-weight: 600;
      text-decoration: none;
      margin: 0 5px;
      transition: color 0.3s ease;
    }

    .links a:hover {
      color: #ff7043; /* warna caramel */
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Login Penjual</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        
        <div class="links">
            <a href="index.php">← Kembali ke Beranda</a><br>
            Belum punya akun? <a href="register.php">Daftar di sini</a>
        </div>
    </div>
</body>
</html>
