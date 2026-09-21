<?php
$pageTitle = "Dashboard - Kost Papa";
require_once __DIR__ . '/includes/koneksi.php';
require_once __DIR__ . '/includes/header.php';

$totalKamar = 0;
$totalPenghuni = 0;

try {
    $totalKamar = $pdo->query("SELECT COUNT(*) FROM kamar")->fetchColumn();
    $totalPenghuni = $pdo->query("SELECT COUNT(*) FROM penghuni")->fetchColumn();
} catch (Exception $e) {
    // Abaikan jika tabel kosong
}
?>

<main class="card-box">
  <h2>Dashboard Kost Papa</h2>
  <p style="color: #94a3b8; margin-bottom: 1.5rem;">Selamat datang di sistem manajemen Kost Papa.</p>

  <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem; margin-bottom: 1.5rem;">
    <div style="background: #09132b; border: 1px solid #1e293b; padding: 1.25rem; border-radius: 8px;">
      <span style="color: #94a3b8; font-size: 0.85rem;">Total Kamar</span>
      <h3 style="font-size: 1.75rem; color: #38bdf8; margin-top: 0.25rem;"><?= $totalKamar ?></h3>
    </div>
    <div style="background: #09132b; border: 1px solid #1e293b; padding: 1.25rem; border-radius: 8px;">
      <span style="color: #94a3b8; font-size: 0.85rem;">Total Penghuni Aktif</span>
      <h3 style="font-size: 1.75rem; color: #38bdf8; margin-top: 0.25rem;"><?= $totalPenghuni ?></h3>
    </div>
  </div>

  <div style="display: flex; gap: 0.75rem;">
    <a href="/jobsheet-07/kamar/list.php" class="btn-action">Kelola Kamar &rarr;</a>
    <a href="/jobsheet-07/penghuni/list.php" class="btn-action" style="background: #1e293b;">Kelola Penghuni &rarr;</a>
  </div>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>