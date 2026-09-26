<?php
$page_title = "Daftar Kamar";
include __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/koneksi.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

$perPage = 5;
$page = max(1, (int) ($_GET['page'] ?? 1));
$offset = ($page - 1) * $perPage;
$keyword = trim($_GET['q'] ?? '');

if ($keyword !== '') {
    $hitung = $pdo->prepare("SELECT COUNT(*) FROM kamar_09 WHERE nomor_kamar ILIKE :kw OR fasilitas ILIKE :kw");
    $hitung->execute(['kw' => '%' . $keyword . '%']);
    $totalRows = $hitung->fetchColumn();

    $stmt = $pdo->prepare("SELECT * FROM kamar_09 WHERE nomor_kamar ILIKE :kw OR fasilitas ILIKE :kw ORDER BY id DESC LIMIT :limit OFFSET :offset");
    $stmt->bindValue('kw', '%' . $keyword . '%');
} else {
    $totalRows = $pdo->query("SELECT COUNT(*) FROM kamar_09")->fetchColumn();
    $stmt = $pdo->prepare("SELECT * FROM kamar_09 ORDER BY id DESC LIMIT :limit OFFSET :offset");
}
$stmt->bindValue('limit', $perPage, PDO::PARAM_INT);
$stmt->bindValue('offset', $offset, PDO::PARAM_INT);
$stmt->execute();

$daftarKamar = $stmt->fetchAll(PDO::FETCH_ASSOC);
$totalPages = max(1, (int) ceil($totalRows / $perPage));
?>
        <section>
            <h2>Daftar Kamar Kost</h2>

            <?php if ($flash): ?>
                <p class="flash flash-<?php echo htmlspecialchars($flash['type']); ?>"><?php echo htmlspecialchars($flash['pesan']); ?></p>
            <?php endif; ?>

            <div class="search-box">
                <form method="get" action="list.php">
                    <span>
                        <label for="search-input">Cari Kamar / Fasilitas</label><br>
                        <input type="text" id="search-input" name="q" value="<?php echo htmlspecialchars($keyword); ?>" placeholder="Ketik nomor kamar atau fasilitas...">
                    </span>
                    <button type="submit">Cari</button>
                </form>
            </div>

            <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>No. Kamar</th>
                        <th>Tipe</th>
                        <th>Fasilitas</th>
                        <th>Harga/Bulan</th>
                        <th>Kapasitas</th>
                        <th>Status</th>
                        <th>Tgl Ditambahkan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($daftarKamar)): ?>
                    <tr>
                        <td colspan="8">Tidak ada data kamar yang cocok.</td>
                    </tr>
                    <?php else: ?>
                        <?php foreach ($daftarKamar as $kamar): ?>
                        <tr>
                            <td><strong><?php echo htmlspecialchars($kamar['nomor_kamar']); ?></strong></td>
                            <td><?php echo ucfirst(htmlspecialchars($kamar['tipe_kamar'])); ?></td>
                            <td><?php echo htmlspecialchars($kamar['fasilitas']); ?></td>
                            <td>Rp <?php echo number_format($kamar['harga_bulanan'], 0, ',', '.'); ?></td>
                            <td><?php echo htmlspecialchars($kamar['kapasitas']); ?> Orang</td>
                            <td>
                                <span style="font-weight: bold; color: <?php echo $kamar['status'] === 'Kosong' ? '#22c55e' : '#ef4444'; ?>;">
                                    <?php echo htmlspecialchars($kamar['status']); ?>
                                </span>
                            </td>
                            <td><?php echo htmlspecialchars($kamar['tanggal_ditambahkan']); ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $kamar['id']; ?>" class="btn-edit">Edit</a>
                                <form class="form-hapus" method="post" action="hapus.php" style="display:inline;">
                                    <input type="hidden" name="id" value="<?php echo $kamar['id']; ?>">
                                    <button type="submit" class="btn-hapus">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            </div>

            <nav class="pagination">
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="list.php?page=<?php echo $i; ?><?php echo $keyword !== '' ? '&q=' . urlencode($keyword) : ''; ?>"
                   class="<?php echo $i === $page ? 'active' : ''; ?>"><?php echo $i; ?></a>
                <?php endfor; ?>
            </nav>
        </section>
<?php include __DIR__ . '/../includes/footer.php'; ?>