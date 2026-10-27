<?php
session_start();
$_SESSION['role'] = 'pembeli'; // otomatis set pembeli
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Form Pembeli Coffee Menu</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f6f0e3;
      padding: 20px;
    }
    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      max-width: 400px;
      margin: auto;
    }
    h2 {
      text-align: center;
      color: #6b4c3b;
    }
    .form-group {
      margin-bottom: 15px;
    }
    label {
      display: block;
      color: #6b4c3b;
      margin-bottom: 5px;
      font-weight: bold;
    }
    select, input[type="number"], input[type="text"] {
      width: 100%;
      padding: 8px;
      box-sizing: border-box;
      border-radius: 4px;
      border: 1px solid #ccc;
    }
    button {
      background-color: #6b4c3b;
      color: white;
      border: none;
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }
    button:hover {
      background-color: #552e1b;
    }
    .result {
      max-width: 400px;
      margin: 20px auto;
      background-color: #e9dccc;
      border-radius: 8px;
      padding: 15px;
      color: #5a4331;
    }
  </style>
</head>
<body>


<br>
<button onclick="window.location.href='menu.php'" style="background-color:#6b4b3b;color:white;padding:10px 20px;border:none;border-radius:5px;cursor:pointer;">
    Kembali ke Menu
</button>


<?php
$coffeeMenu = [
  "Espresso" => 15000,
  "Americano" => 15000,
  "Cappuccino" => 12000,
  "Latte" => 12000,
  "Mocha" => 12000
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = htmlspecialchars($_POST['nama']);
    $coffee = $_POST['coffee'];
    $qty = (int)$_POST['qty'];

    if ($qty > 0 && isset($coffeeMenu[$coffee])) {
        $harga = $coffeeMenu[$coffee];
        $total = $harga * $qty;
        
    } else {
        echo "<div class='result'>Masukkan jumlah yang valid dan pilih menu kopi.</div>";
    }
}
?>

<div style="background-color: #f1e6d0; padding: 20px; border-radius: 10px; margin-bottom: 20px;">
  <b>Pesanan Anda:</b><br>
  Nama: <span id="displayNama"></span><br>
  No Meja: <span id="displayNoMeja"></span><br>
  Menu Coffee: <span id="displayMenu"></span><br>
  Jumlah: <span id="displayJumlah"></span><br><br>
  <b>Total Harga: Rp <span id="displayTotal"></span></b>
</div>

<form method="POST" action="keranjang.php" style="background: white; padding: 20px; border-radius: 10px;">
  <h2 style="color: #6b4c3b;">Form Pembeli Coffee</h2>

  <label for="nama">Nama Pembeli:</label><br>
  <input type="text" id="nama" name="nama" placeholder="Masukkan nama Anda" required><br><br>

  <label for="noMeja">No Meja:</label><br>
  <input type="number" id="noMeja" name="noMeja" placeholder="Masukkan nomor meja" required><br><br>

  <label for="menuCoffee">Pilih Menu Coffee:</label><br>
  <select id="menuCoffee" name="menuCoffee" required>
    <option value="">Pilih kopi</option>
    <option value="Cappuccino">Cappuccino</option>
    <option value="Latte">Latte</option>
    <option value="Espresso">Espresso</option>
  </select><br><br>

  <label for="jumlah">Jumlah Pesanan:</label><br>
  <input type="number" id="jumlah" name="jumlah" placeholder="Masukkan jumlah" required><br><br>

  <button type="submit">Pesan</button>
</form>


<script>
  function pesan() {
    const hargaMenu = {
      "Cappuccino": 12000,
      "Latte": 12000,
       "Espresso 1x Shot": 10000,
    };

    let nama = document.getElementById("nama").value;
    let noMeja = document.getElementById("noMeja").value;
    let menu = document.getElementById("menuCoffee").value;
    let jumlah = parseInt(document.getElementById("jumlah").value);

    if (!nama || !noMeja || !menu || !jumlah) {
      alert("Silakan isi semua data dengan benar!");
      return;
    }

    let totalHarga = hargaMenu[menu] * jumlah;

    document.getElementById("displayNama").innerText = nama;
    document.getElementById("displayNoMeja").innerText = noMeja;
    document.getElementById("displayMenu").innerText = menu;
    document.getElementById("displayJumlah").innerText = jumlah;
    document.getElementById("displayTotal").innerText = totalHarga.toLocaleString();
  }
</script>




</body>
</html>