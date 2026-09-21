<?php
$page_title = "Daftar Penghuni";
require_once __DIR__ . '/../includes/koneksi.php';
require_once __DIR__ . '/../includes/header.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

$daftarPenghuni = $pdo->query("SELECT * FROM penghuni ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="card-box">
  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
    <h2>Daftar Penghuni Kost</h2>
    <a href="tambah.php" class="btn-action">+ Tambah Penghuni</a>
  </div>

  <?php if ($flash): ?>
    <p style="padding: 0.75rem; border-radius: 6px; margin-bottom: 1rem; background: rgba(56, 189, 248, 0.2); color: #38bdf8;">
      <?= htmlspecialchars($flash['pesan']); ?>
    </p>
  <?php endif; ?>

  <div style="overflow-x: auto;">
    <table>
      <thead>
        <tr>
          <th>NIK</th>
          <th>Nama</th>
          <th>No. Telepon</th>
          <th>Pekerjaan</th>
          <th>Tanggal Terdaftar</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($daftarPenghuni)): ?>
          <tr>
            <td colspan="5" style="text-align: center; color: #64748b;">Belum ada data penghuni.</td>
          </tr>
        <?php else: ?>
          <?php foreach ($daftarPenghuni as $p): ?>
            <tr>
              <td><?= htmlspecialchars($p['nik']); ?></td>
              <td><b><?= htmlspecialchars($p['nama']); ?></b></td>
              <td><?= htmlspecialchars($p['no_telepon']); ?></td>
              <td><?= htmlspecialchars($p['pekerjaan']); ?></td>
              <td>
                <?= !empty($p['tanggal_daftar']) ? date('d-m-Y H:i', strtotime($p['tanggal_daftar'])) : '-'; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>