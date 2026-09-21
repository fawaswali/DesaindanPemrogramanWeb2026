<?php
$pageTitle = "Tambah Kamar - Kost Papa";
require_once __DIR__ . '/../includes/koneksi.php';

$error = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nomor_kamar = trim($_POST['nomor_kamar'] ?? '');
    $tipe_kamar = trim($_POST['tipe_kamar'] ?? '');
    $fasilitas = trim($_POST['fasilitas'] ?? '');
    $harga_bulanan = (int)($_POST['harga_bulanan'] ?? 0);
    $status = trim($_POST['status'] ?? 'Kosong');

    if (!empty($nomor_kamar) && $harga_bulanan > 0) {
        try {
            $stmt = $pdo->prepare("INSERT INTO kamar_j7 (nomor_kamar, tipe_kamar, fasilitas, harga_bulanan, status, tanggal_ditambahkan) VALUES (?, ?, ?, ?, ?, NOW())");
            $stmt->execute([$nomor_kamar, $tipe_kamar, $fasilitas, $harga_bulanan, $status]);

            header("Location: list.php");
            exit;
        } catch (PDOException $e) {
            $error = "Gagal menyimpan: " . $e->getMessage();
        }
    } else {
        $error = "Nomor kamar dan tarif bulanan wajib diisi.";
    }
}

require_once __DIR__ . '/../includes/header.php';
?>

<div class="card-box" style="max-width: 600px; margin: 0 auto;">
  <h2>Tambah Kamar Baru</h2>

  <?php if ($error): ?>
    <div style="background: rgba(239, 68, 68, 0.2); border: 1px solid #ef4444; color: #f87171; padding: 0.75rem; border-radius: 6px; margin-bottom: 1rem; font-size: 0.9rem;">
      <?= htmlspecialchars($error) ?>
    </div>
  <?php endif; ?>

  <form action="" method="POST">
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
      <label for="fasilitas">Fasilitas</label>
      <input type="text" id="fasilitas" name="fasilitas" placeholder="Contoh: Kasur, Lemari, Wi-Fi" required>
    </div>
    <div class="form-group">
      <label for="harga_bulanan">Harga per Bulan (Rp)</label>
      <input type="number" id="harga_bulanan" name="harga_bulanan" placeholder="Contoh: 850000" required>
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