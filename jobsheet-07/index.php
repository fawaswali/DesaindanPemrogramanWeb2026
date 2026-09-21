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
    // Tangani jika tabel belum terisi data
}
?>

<main class="card-box">
  <h2>Dashboard Kost Papa</h2>
  <p style="color: #94a3b8; margin-bottom: 1.5rem;">Selamat datang di sistem manajemen Kost Papa.</p>

  <div class="stats-grid">
    <div class="stat-card">
      <span>Total Kamar</span>
      <div class="value"><?= $totalKamar ?></div>
    </div>
    <div class="stat-card">
      <span>Total Penghuni Aktif</span>
      <div class="value"><?= $totalPenghuni ?></div>
    </div>
  </div>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>