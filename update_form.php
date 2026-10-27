<!-- hidden id (PK) -->
<input type="hidden" name="id" value="<?= $data['id']; ?>">

<label>Nama Menu:</label>
<input type="text" name="nama_menu" value="<?= $data['nama_menu']; ?>" required>

<label>Harga:</label>
<input type="number" name="harga" value="<?= $data['harga']; ?>" required>

<label>Gambar Saat Ini:</label>
<?php if (!empty($data['gambar'])): ?>
  <img src="uploads/<?= $data['gambar']; ?>" alt="gambar" class="preview">
<?php else: ?>
  <p>(Belum ada gambar)</p>
<?php endif; ?>

<label>Ganti Gambar (opsional):</label>
<input type="file" name="gambar_menu">
