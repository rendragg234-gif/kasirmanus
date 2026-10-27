<?php
include 'koneksi.php';

// ambil data menu
$result = mysqli_query($conn, "SELECT * FROM tbl_menu");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Menu</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #f9f9f9, #e3f2fd);
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      min-height: 100vh;
    }

    .container {
      width: 90%;
      max-width: 950px;
      margin: 40px auto;
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.15);
      padding: 30px;
      animation: fadeIn 0.6s ease-in-out;
    }

    h2 {
      text-align: center;
      color: #007bff;
      margin-bottom: 10px;
    }

    p {
      text-align: center;
      color: #666;
      margin-bottom: 25px;
      font-size: 14px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      background: #fff;
      border-radius: 10px;
      overflow: hidden;
    }

    th, td {
      border: 1px solid #eee;
      padding: 12px;
      text-align: center;
    }

    th {
      background: #007bff;
      color: #fff;
      font-weight: 600;
    }

    tr:nth-child(even) {
      background: #f9f9f9;
    }

    img {
      max-width: 80px;
      border-radius: 6px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    }

    .btn {
      display: inline-block;
      padding: 10px 18px;
      margin: 12px 0;
      background: #007bff;
      color: #fff;
      text-decoration: none;
      border-radius: 8px;
      transition: 0.3s;
      font-weight: 600;
    }

    .btn:hover {
      background: #0056b3;
    }

    .btn-hapus {
      background: #dc3545;
      padding: 6px 12px;
      font-size: 13px;
      border-radius: 6px;
      color: #fff;
      text-decoration: none;
    }

    .btn-hapus:hover {
      background: #b52a37;
    }

    @keyframes fadeIn {
      from {opacity: 0; transform: translateY(-10px);}
      to {opacity: 1; transform: translateY(0);}
    }
  </style>
</head>
<body>
<div class="container">
  <h2>📋 Daftar Menu Café</h2>
  <p>Berikut adalah daftar menu yang sudah ditambahkan</p>
  <a href="menu_add.php" class="btn">+ Tambah Menu</a>

  <table>
    <tr>
      <th>No</th>
      <th>Nama Menu</th>
      <th>Harga</th>
      <th>Gambar</th>
      <th>Aksi</th>
    </tr>
    <?php 
    if (mysqli_num_rows($result) > 0) {
      $no = 1;
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>".$no++."</td>
                <td>".$row['nama']."</td>
                <td>Rp ".number_format($row['harga'],0,',','.')."</td>
                <td><img src='uploads/".$row['img']."' alt='menu'></td>
                <td><a href='menu_delete.php?id=".$row['id']."' class='btn-hapus' onclick=\"return confirm('Yakin ingin menghapus menu ini?')\">Hapus</a></td>
              </tr>";
      }
    } else {
      echo "<tr><td colspan='5'>Belum ada menu.</td></tr>";
    }
    ?>
  </table>
</div>
</body>
</html>
