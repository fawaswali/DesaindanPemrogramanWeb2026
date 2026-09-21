<?php
date_default_timezone_set('Asia/Jakarta');
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
                <?php 
                  if (!empty($p['tanggal_daftar'])) {
                      $dt = new DateTime($p['tanggal_daftar']);
                      $dt->setTimezone(new DateTimeZone('Asia/Jakarta'));
                      echo $dt->format('d-m-Y H:i') . ' WIB';
                  } else {
                      echo '-';
                  }
                ?>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>