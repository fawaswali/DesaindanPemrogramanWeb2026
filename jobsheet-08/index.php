<?php
$page_title = "Beranda Kost Mini";
include __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/koneksi.php';

$totalKamar    = $pdo->query("SELECT COUNT(*) FROM kamar")->fetchColumn();
$totalPenghuni = $pdo->query("SELECT COUNT(*) FROM penghuni")->fetchColumn();
$kamarKosong   = $pdo->query("SELECT COUNT(*) FROM kamar WHERE status = 'Tersedia'")->fetchColumn();
?>
<section>
    <h2>Dashboard Kost Mini</h2>
    <p>Selamat datang di sistem informasi pengelolaan kamar dan penghuni kost.</p>
    
    <div class="stats-grid">
        <div class="stat-card stat-card-kamar">
            <h3>Total Kamar</h3>
            <p class="stat-number"><?php echo $totalKamar; ?> <span>Unit</span></p>
            <small class="stat-subtext">Tersedia: <?php echo $kamarKosong; ?> Kamar</small>
        </div>

        <div class="stat-card stat-card-penghuni">
            <h3>Total Penghuni</h3>
            <p class="stat-number"><?php echo $totalPenghuni; ?> <span>Orang</span></p>
            <small class="stat-subtext stat-subtext-muted">Terdaftar aktif</small>
        </div>
    </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>