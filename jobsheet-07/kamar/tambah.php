<?php
$pageTitle = "Tambah Kamar - Kost Papa";
require_once __DIR__ . '/../includes/header.php';
?>

<div class="card-box" style="max-width: 600px; margin: 0 auto;">
  <h2>Tambah Kamar Baru</h2>
  <form action="proses_tambah.php" method="POST">
    <div class="form-group">
      <label for="nomor_kamar">Nomor Kamar</label>
      <input type="text" id="nomor_kamar" name="nomor_kamar" placeholder="Contoh: A01" required>
    </div>
    <div class="form-group">
      <label for="tipe_kamar">Tipe Kamar</label>
      <select id="tipe_kamar" name="tipe_kamar">
        <option value="Reguler">Reguler</option>
        <option value="Deluxe">Deluxe</option>
        <option value="VIP">VIP</option>
      </select>
    </div>
    <div class="form-group">
      <label for="harga">Harga per Bulan (Rp)</label>
      <input type="number" id="harga" name="harga" placeholder="Contoh: 850000" required>
    </div>
    <div class="form-group">
      <label for="status">Status</label>
      <select id="status" name="status">
        <option value="Kosong">Kosong</option>
        <option value="Terisi">Terisi</option>
      </select>
    </div>
    <button type="submit" class="btn-action" style="width: 100%; padding: 0.75rem; margin-top: 0.5rem;">Simpan Kamar</button>
  </form>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>