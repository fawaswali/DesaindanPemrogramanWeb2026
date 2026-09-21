<?php
$page_title = "Daftar Kamar";
include __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/koneksi.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

$daftarKamar = $pdo->query("SELECT * FROM kamar ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<section>
    <h2>Daftar Kamar Kost</h2>

    <?php if ($flash): ?>
        <p class="flash flash-<?php echo $flash['type']; ?>"><?php echo $flash['pesan']; ?></p>
    <?php endif; ?>

    <div class="table-responsive">
    <table>
        <thead>
            <tr>
                <th>No. Kamar</th>
                <th>Tipe</th>
                <th>Fasilitas</th>
                <th>Harga / Bulan</th>
                <th>Status</th>
                <th>Tanggal Ditambahkan</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($daftarKamar)): ?>
            <tr>
                <td colspan="6">Belum ada data kamar.</td>
            </tr>
            <?php else: ?>
                <?php foreach ($daftarKamar as $k): ?>
                <tr>
                    <td><strong><?php echo htmlspecialchars($k['nomor_kamar']); ?></strong></td>
                    <td><?php echo htmlspecialchars($k['tipe_kamar']); ?></td>
                    <td><?php echo htmlspecialchars($k['fasilitas']); ?></td>
                    <td>Rp <?php echo number_format($k['harga_bulanan'], 0, ',', '.'); ?></td>
                    <td><?php echo htmlspecialchars($k['status']); ?></td>
                    <td>
                        <?php echo !empty($k['tanggal_ditambahkan']) ? date('d-m-Y H:i', strtotime($k['tanggal_ditambahkan'])) : '-'; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    </div>
</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>