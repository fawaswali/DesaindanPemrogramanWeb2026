<?php
$pageTitle = "Daftar Penghuni - Kost Papa";
require_once __DIR__ . '/../includes/koneksi.php';
require_once __DIR__ . '/../includes/header.php';

$stmt = $pdo->query("SELECT * FROM penghuni ORDER BY 1 ASC");
$penghuni = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="card-box">
  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
    <h2>Daftar Penghuni</h2>
    <a href="tambah.php" class="btn-action">+ Tambah Penghuni</a>
  </div>

  <table>
    <thead>
      <tr>
        <th>Nama</th>
        <th>No. HP</th>
        <th>Kamar</th>
        <th>Tanggal Masuk</th>
      </tr>
    </thead>
    <tbody>
      <?php if (empty($penghuni)): ?>
        <tr><td colspan="4" style="text-align: center; color: #64748b;">Belum ada data penghuni.</td></tr>
      <?php else: ?>
        <?php foreach ($penghuni as $p): ?>
          <tr>
            <td><b><?= htmlspecialchars($p['nama'] ?? '-') ?></b></td>
            <td><?= htmlspecialchars($p['no_hp'] ?? '-') ?></td>
            <td><span style="color: #38bdf8;">Kamar <?= htmlspecialchars($p['nomor_kamar'] ?? '-') ?></span></td>
            <td><?= htmlspecialchars($p['tanggal_masuk'] ?? '-') ?></td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>