<?php
$pageTitle = "Daftar Kamar - Kost Papa";
require_once __DIR__ . '/../includes/koneksi.php';
require_once __DIR__ . '/../includes/header.php';

$stmt = $pdo->query("SELECT * FROM kamar_j7 ORDER BY nomor_kamar ASC");
$kamar = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="card-box">
  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
    <h2>Daftar Kamar</h2>
    <a href="tambah.php" class="btn-action">+ Tambah Kamar</a>
  </div>

  <table>
    <thead>
      <tr>
        <th>No. Kamar</th>
        <th>Tipe</th>
        <th>Harga / Bulan</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php if (empty($kamar)): ?>
        <tr><td colspan="4" style="text-align: center; color: #64748b;">Belum ada data kamar.</td></tr>
      <?php else: ?>
        <?php foreach ($kamar as $k): ?>
          <tr>
            <td><b><?= htmlspecialchars($k['nomor_kamar'] ?? '-') ?></b></td>
            <td><?= htmlspecialchars($k['tipe_kamar'] ?? '-') ?></td>
           <td>Rp <?= number_format($k['harga_bulanan'] ?? 0, 0, ',', '.') ?></td>
            <td><span style="color: #38bdf8;"><?= htmlspecialchars($k['status'] ?? '-') ?></span></td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>