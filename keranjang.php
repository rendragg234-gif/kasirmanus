<?php
session_start();

// harga menu
$hargaMenu = [
    "Cappuccino" => 12000,
    "Latte" => 12000,
    "Espresso" => 10000
];

// simpan pesanan ke session
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pesanan = [
        "nama" => $_POST['nama'],
        "meja" => $_POST['noMeja'],
        "menu" => $_POST['menuCoffee'],
        "jumlah" => (int)$_POST['jumlah'],
        "harga" => $hargaMenu[$_POST['menuCoffee']],
    ];
    
    $pesanan['total'] = $pesanan['harga'] * $pesanan['jumlah'];

    $_SESSION['keranjang'][] = $pesanan;
}

// ambil isi keranjang
$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : [];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang Pesanan</title>
    <style>
        body { font-family: Arial, sans-serif; background:#f6f0e3; padding:20px; }
        .container { background:#fff; padding:20px; border-radius:10px; max-width:700px; margin:auto; }
        h2 { color:#6b4c3b; text-align:center; }
        table { width:100%; border-collapse:collapse; margin-top:15px; }
        th, td { border:1px solid #ddd; padding:10px; text-align:center; }
        th { background:#6b4226; color:white; }
        .btn { display:inline-block; padding:10px 15px; background:#6b4226; color:#fff; border-radius:5px; text-decoration:none; margin-top:10px; }
        .btn:hover { background:#4e2f1c; }
    </style>
</head>
<body>
<div class="container">
    <h2>🛒 Keranjang Pesanan</h2>

    <?php if (empty($keranjang)) { ?>
        <p>Keranjang masih kosong.</p>
    <?php } else { ?>
        <table>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No Meja</th>
                <th>Menu</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total</th>
            </tr>
            <?php $no=1; $grandTotal=0;
            foreach ($keranjang as $item) {
                $grandTotal += $item['total'];
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($item['nama']) ?></td>
                <td><?= htmlspecialchars($item['meja']) ?></td>
                <td><?= $item['jumlah'] ?></td>
                <td>Rp <?= number_format($item['harga'],0,',','.') ?></td>
                <td>Rp <?= number_format($item['total'],0,',','.') ?></td>
            </tr>
            <?php } ?>
            <tr>
                <th colspan="6">Grand Total</th>
                <th>Rp <?= number_format($grandTotal,0,',','.') ?></th>
            </tr>
        </table>
    <?php } ?>

    <a href="menu.php" class="btn">⬅ Kembali ke Menu</a>
</div>
</body>
</html>
