<?php
include 'koneksi.php';
session_start();

$role = isset($_SESSION['role']) ? $_SESSION['role'] : '';

// ambil kategori dari URL
$kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';

if ($kategori != '') {
    $result = mysqli_query($conn, "SELECT * FROM tbl_menu WHERE id_kategori='$kategori' ORDER BY id DESC");
} else {
    $result = mysqli_query($conn, "SELECT * FROM tbl_menu ORDER BY id DESC");
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Menu</title>
  <style>
    /* === STYLE PREMIUM RESTORAN === */
    body {
      background: linear-gradient(135deg, #f7f3ef, #ece2d9);
      font-family: 'Poppins', sans-serif;
      color: #3a2e2e;
      margin: 0;
      padding: 0;
    }

    .table-container {
      background: #ffffff;
      padding: 25px;
      margin: 30px auto;
      border-radius: 25px;
      box-shadow: 0 12px 40px rgba(0, 0, 0, 0.08);
      max-width: 90%;
      border: 1px solid #e3d6cc;
    }

    h1 {
      font-size: 2.5rem;
      font-weight: 700;
      text-align: center;
      color: #4a2c2a;
      margin-bottom: 25px;
      letter-spacing: 1.5px;
      text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
    }

    /* Tombol filter kategori */
    .filter-buttons {
      display: flex;
      justify-content: center;
      gap: 15px;
      margin-bottom: 20px;
    }

    .filter-btn {
      background: #f2e8e2;
      border: 2px solid #d5bfae;
      color: #4a2c2a;
      padding: 8px 16px;
      border-radius: 10px;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s ease;
    }

    .filter-btn.active,
    .filter-btn:hover {
      background: linear-gradient(135deg, #8B5E3C, #6B3E2E);
      color: white;
      transform: scale(1.05);
      border-color: #8B5E3C;
    }

    /* Tombol keranjang */
    .keranjang {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: linear-gradient(135deg, #8B5E3C, #6B3E2E);
      color: white;
      padding: 12px 18px;
      border-radius: 12px;
      border: none;
      font-weight: 600;
      font-size: 1rem;
      cursor: pointer;
      transition: all 0.3s ease;
      margin-bottom: 15px;
    }

    .keranjang:hover {
      background: linear-gradient(135deg, #A66B48, #7B4C38);
      transform: scale(1.05);
    }

    table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0 14px;
    }

    thead {
      background: #6B3E2E;
      color: #fff;
    }

    thead th {
      padding: 15px;
      text-transform: uppercase;
      font-size: 0.9rem;
      letter-spacing: 1px;
    }

    tbody tr {
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
    }

    tbody tr:hover {
      transform: translateY(-4px) scale(1.01);
      box-shadow: 0 12px 25px rgba(0, 0, 0, 0.08);
    }

    tbody td {
      text-align: center;
      padding: 15px;
      font-size: 1rem;
    }

    tbody td img {
      width: 80px;
      height: 80px;
      border-radius: 15px;
      object-fit: cover;
      border: 3px solid #f1e3d6;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      transition: 0.3s ease;
    }

    tbody td img:hover {
      transform: scale(1.08);
      border-color: #c89f7b;
    }

    .order-btn {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      background: linear-gradient(135deg, #8B5E3C, #6B3E2E);
      color: white;
      padding: 8px 16px;
      border-radius: 10px;
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s ease;
      box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
    }

    .order-btn:hover {
      background: linear-gradient(135deg, #A66B48, #7B4C38);
      transform: translateY(-2px);
    }
  </style>
</head>
<body>

  <div class="table-container">
    <h1>🍵 DAFTAR MENU 📝</h1>

    <button class="keranjang">🛒 Keranjang</button>

    <div class="filter-buttons">
      <button class="filter-btn active" data-filter="all">Semua</button>
      <button class="filter-btn" data-filter="makanan">🍽️ Makanan</button>
      <button class="filter-btn" data-filter="minuman">🥤 Minuman</button>
    </div>

    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Menu</th>
          <th>Harga</th>
          <th>Gambar</th>
          <th>Kategori</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr data-category="minuman">
          <td>1</td>
          <td>Latte Art</td>
          <td>Rp 12.000</td>
          <td><img src="https://i.ibb.co/QbL4PgP/latte.jpg" alt="Latte Art"></td>
          <td>Minuman</td>
          <td><a href="#" class="order-btn">🛒 Order</a></td>
        </tr>
        <tr data-category="minuman">
          <td>2</td>
          <td>Cappuccino</td>
          <td>Rp 12.000</td>
          <td><img src="https://i.ibb.co/yYk3gFr/cappuccino.jpg" alt="Cappuccino"></td>
          <td>Minuman</td>
          <td><a href="#" class="order-btn">🛒 Order</a></td>
        </tr>
        <tr data-category="makanan">
          <td>3</td>
          <td>Croissant</td>
          <td>Rp 15.000</td>
          <td><img src="https://i.ibb.co/vzQmrRf/croissant.jpg" alt="Croissant"></td>
          <td>Makanan</td>
          <td><a href="#" class="order-btn">🛒 Order</a></td>
        </tr>
      </tbody>
    </table>
  </div>

  <script>
    // === FILTER MENU ===
    const filterBtns = document.querySelectorAll(".filter-btn");
    const rows = document.querySelectorAll("tbody tr");

    filterBtns.forEach(btn => {
      btn.addEventListener("click", () => {
        filterBtns.forEach(b => b.classList.remove("active"));
        btn.classList.add("active");

        const filter = btn.getAttribute("data-filter");
        rows.forEach(row => {
          const category = row.getAttribute("data-category");
          if (filter === "all" || category === filter) {
            row.style.display = "";
          } else {
            row.style.display = "none";
          }
        });
      });
    });
  </script>

</body>
</html>
