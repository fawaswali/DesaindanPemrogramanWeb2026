<?php
$page_title = "Beranda";
include __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/koneksi.php';

$totalKamar = $pdo->query("SELECT COUNT(*) FROM kamar_09")->fetchColumn();
$totalPenghuni = $pdo->query("SELECT COUNT(*) FROM penghuni_09")->fetchColumn();
$kamarTerisi = $pdo->query("SELECT COUNT(*) FROM kamar_09 WHERE status = 'Terisi'")->fetchColumn();
?>
        <section>
            <h2>Selamat Datang di Sistem Manajemen Kost Papa</h2>
            <p>Aplikasi untuk mengelola data kamar kost, penghuni, dan ketersediaan kamar secara mudah.</p>
        </section>

        <section>
            <h2>Ringkasan Kost</h2>
            <article>
                <h3>Total Kamar</h3>
                <p><?php echo $totalKamar; ?></p>
            </article>
            <article>
                <h3>Total Penghuni</h3>
                <p><?php echo $totalPenghuni; ?></p>
            </article>
            <article>
                <h3>Kamar Terisi</h3>
                <p><?php echo $kamarTerisi; ?></p>
            </article>
        </section>
<?php include __DIR__ . '/includes/footer.php'; ?>