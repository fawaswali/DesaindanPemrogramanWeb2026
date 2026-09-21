<?php
$page_title = "Daftar Penghuni";
include __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/koneksi.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

$daftarPenghuni = $pdo->query("SELECT * FROM penghuni ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<section>
    <h2>Daftar Penghuni Kost</h2>

    <?php if ($flash): ?>
        <p class="flash flash-<?php echo $flash['type']; ?>"><?php echo $flash['pesan']; ?></p>
    <?php endif; ?>

    <div class="table-responsive">
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
                <td colspan="5">Belum ada data penghuni.</td>
            </tr>
            <?php else: ?>
                <?php foreach ($daftarPenghuni as $p): ?>
                <tr>
                    <td><?php echo htmlspecialchars($p['nik']); ?></td>
                    <td><?php echo htmlspecialchars($p['nama']); ?></td>
                    <td><?php echo htmlspecialchars($p['no_telepon']); ?></td>
                    <td><?php echo htmlspecialchars($p['pekerjaan']); ?></td>
                    <td>
                        <?php echo !empty($p['tanggal_daftar']) ? date('d-m-Y H:i', strtotime($p['tanggal_daftar'])) : '-'; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    </div>
</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>