<?php
$pageTitle = "Tambah Penghuni - Kost Papa";
require_once __DIR__ . '/../includes/koneksi.php';
require_once __DIR__ . '/../includes/header.php';

$kamarKosong = $pdo->query("SELECT id_kamar, nomor_kamar FROM kamar ORDER BY nomor_kamar ASC")->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="card-box" style="max-width: 600px; margin: 0 auto;">
  <h2>Tambah Penghuni Baru</h2>
  <form action="proses_tambah.php" method="POST">
    <div class="form-group">
      <label for="nama">Nama Lengkap</label>
      <input type="text" id="nama" name="nama" required>
    </div>
    <div class="form-group">
      <label for="no_hp">Nomor HP</label>
      <input type="text" id="no_hp" name="no_hp" required>
    </div>
    <div class="form-group">
      <label for="id_kamar">Pilih Kamar</label>
      <select id="id_kamar" name="id_kamar" required>
        <?php foreach ($kamarKosong as $km): ?>
          <option value="<?= $km['id_kamar'] ?>">Kamar <?= htmlspecialchars($km['nomor_kamar']) ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group">
      <label for="tanggal_masuk">Tanggal Masuk</label>
      <input type="date" id="tanggal_masuk" name="tanggal_masuk" value="<?= date('Y-m-d') ?>" required>
    </div>
    <button type="submit" class="btn-action" style="width: 100%; padding: 0.75rem; margin-top: 0.5rem;">Simpan Data</button>
  </form>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>