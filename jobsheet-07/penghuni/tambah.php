<?php
$pageTitle = "Tambah Penghuni - Kost Papa";
require_once __DIR__ . '/../includes/koneksi.php';

$error = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nik = trim($_POST['nik'] ?? '');
    $nama = trim($_POST['nama'] ?? '');
    $no_telepon = trim($_POST['no_telepon'] ?? '');
    $pekerjaan = trim($_POST['pekerjaan'] ?? '');

    if (!empty($nik) && !empty($nama)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO penghuni_j7 (nik, nama, no_telepon, pekerjaan, tanggal_daftar) VALUES (?, ?, ?, ?, NOW())");
            $stmt->execute([$nik, $nama, $no_telepon, $pekerjaan]);

            header("Location: list.php");
            exit;
        } catch (PDOException $e) {
            $error = "Gagal menyimpan: " . $e->getMessage();
        }
    } else {
        $error = "NIK dan Nama lengkap wajib diisi.";
    }
}

require_once __DIR__ . '/../includes/header.php';
?>

<div class="card-box" style="max-width: 600px; margin: 0 auto;">
  <h2>Tambah Penghuni Baru</h2>

  <?php if ($error): ?>
    <div style="background: rgba(239, 68, 68, 0.2); border: 1px solid #ef4444; color: #f87171; padding: 0.75rem; border-radius: 6px; margin-bottom: 1rem; font-size: 0.9rem;">
      <?= htmlspecialchars($error) ?>
    </div>
  <?php endif; ?>

  <form action="" method="POST">
    <div class="form-group">
      <label for="nik">NIK</label>
      <input type="text" id="nik" name="nik" placeholder="Nomor Induk Kependudukan (16 digit)" required>
    </div>
    <div class="form-group">
      <label for="nama">Nama Lengkap</label>
      <input type="text" id="nama" name="nama" placeholder="Masukkan nama penghuni" required>
    </div>
    <div class="form-group">
      <label for="no_telepon">No. Telepon / WhatsApp</label>
      <input type="text" id="no_telepon" name="no_telepon" placeholder="Contoh: 08123456789" required>
    </div>
    <div class="form-group">
      <label for="pekerjaan">Pekerjaan / Instansi</label>
      <input type="text" id="pekerjaan" name="pekerjaan" placeholder="Contoh: Mahasiswa / Karyawan" required>
    </div>
    <button type="submit" class="btn-action" style="width: 100%; padding: 0.75rem; margin-top: 0.5rem;">Simpan Penghuni</button>
  </form>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>