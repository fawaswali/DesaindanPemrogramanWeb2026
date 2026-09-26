<?php
$page_title = 'Beranda';
require_once __DIR__ . '/includes/koneksi.php';

// Ambil statistik dari database
$total_kamar = 0;
$total_penghuni = 0;
$kamar_terisi = 0;

try {
    // Total Kamar
    $qKamar = $pdo->query("SELECT COUNT(*) FROM kamar_09");
    $total_kamar = (int)$qKamar->fetchColumn();

    // Total Penghuni
    $qPenghuni = $pdo->query("SELECT COUNT(*) FROM penghuni_09");
    $total_penghuni = (int)$qPenghuni->fetchColumn();

    // Kamar Terisi (status = 'terisi')
    $qTerisi = $pdo->query("SELECT COUNT(*) FROM kamar_09 WHERE status = 'terisi'");
    $kamar_terisi = (int)$qTerisi->fetchColumn();
} catch (PDOException $e) {
    // Penanganan fallback jika tabel belum terisi data
}

$kamar_kosong = max(0, $total_kamar - $kamar_terisi);

require_once __DIR__ . '/includes/header.php';
?>

<h2>Selamat Datang di Sistem Manajemen Kost Papa</h2>
<p style="color: #94a3b8; margin-bottom: 25px;">Aplikasi untuk mengelola data kamar kost, penghuni, dan ketersediaan kamar secara mudah.</p>

<h3 style="font-size: 16px; color: #f8fafc; margin-bottom: 12px;">Ringkasan Kost</h3>

<div class="stats-grid">
    <div class="stat-card stat-card-kamar">
        <h3>Total Kamar</h3>
        <div class="stat-number"><?php echo $total_kamar; ?></div>
        <span class="stat-subtext"><?php echo $kamar_kosong; ?> kamar kosong</span>
    </div>

    <div class="stat-card stat-card-penghuni">
        <h3>Total Penghuni</h3>
        <div class="stat-number"><?php echo $total_penghuni; ?> <span>orang</span></div>
        <span class="stat-subtext stat-subtext-muted">Aktif terdaftar</span>
    </div>

    <div class="stat-card stat-card-kamar">
        <h3>Kamar Terisi</h3>
        <div class="stat-number"><?php echo $kamar_terisi; ?></div>
        <span class="stat-subtext" style="color: #38bdf8;">Tingkat hunian</span>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>