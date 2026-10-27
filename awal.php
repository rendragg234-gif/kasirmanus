<?php
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pilih Akses</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

    :root {
      --bg: #ffffff;
      --text: #000000;
      --card-bg: #ffffff;
    }

    [data-theme="dark"] {
      --bg: #1a1a1a;
      --text: #f5f5f5;
      --card-bg: #2a2a2a;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
      background-color: var(--bg);
      color: var(--text);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      transition: background 0.3s, color 0.3s;
      background: url('https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=1920&q=80') no-repeat center center/cover;
    }

    .container {
      text-align: center;
      background: var(--card-bg);
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
      max-width: 400px;
      transition: background 0.3s, color 0.3s;
    }

    h1 {
      margin-bottom: 30px;
      color: var(--text);
    }

    .btn {
      display: block;
      width: 100%;
      margin: 15px 0;
      padding: 15px;
      font-size: 18px;
      font-weight: bold;
      border: none;
      border-radius: 12px;
      cursor: pointer;
      transition: 0.3s;
    }

    .btn-pembeli {
      background: #28a745;
      color: white;
    }

    .btn-penjual {
      background: #007bff;
      color: white;
    }

    .btn:hover {
      transform: scale(1.05);
      opacity: 0.9;
    }

    .toggle-btn {
      position: fixed;
      top: 15px;
      right: 15px;
      padding: 8px 12px;
      border-radius: 8px;
      border: none;
      cursor: pointer;
      background: var(--text);
      color: var(--bg);
      font-weight: bold;
    }
  </style>
</head>
<body>
  <button class="toggle-btn" id="themeToggle">🌙</button>

  <div class="container">
    <h1>Pilih Akses</h1>
    <button class="btn btn-pembeli" onclick="goToPembeli()">Pembeli</button>
    <button class="btn btn-penjual" onclick="goToLogin()">Admin</button>
  </div>

  <script>
    function goToLogin() {
      window.location.href = "login.php";
    }

    function goToPembeli() {
      window.location.href = "pembeli.php";
    }

    const toggleBtn = document.getElementById("themeToggle");
    const root = document.documentElement;

    // cek preferensi user sebelumnya (localStorage)
    if (localStorage.getItem("theme")) {
      root.setAttribute("data-theme", localStorage.getItem("theme"));
      toggleBtn.textContent = localStorage.getItem("theme") === "dark" ? "☀️" : "🌙";
    } else {
      // default ikut sistem
      if (window.matchMedia("(prefers-color-scheme: dark)").matches) {
        root.setAttribute("data-theme", "dark");
        toggleBtn.textContent = "☀️";
      }
    }

    toggleBtn.addEventListener("click", () => {
      let currentTheme = root.getAttribute("data-theme");
      if (currentTheme === "dark") {
        root.setAttribute("data-theme", "light");
        localStorage.setItem("theme", "light");
        toggleBtn.textContent = "🌙";
      } else {
        root.setAttribute("data-theme", "dark");
        localStorage.setItem("theme", "dark");
        toggleBtn.textContent = "☀️";
      }
    });
  </script>
</body>
</html>
