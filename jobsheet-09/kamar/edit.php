<?php
$page_title = "Edit Kamar";
require_once __DIR__ . '/../includes/koneksi.php';

$id = $_GET['id'] ?? $_POST['id'] ?? null;
if (!$id) {
    header('Location: list.php');
    exit;
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomor_kamar   = trim($_POST['nomor_kamar'] ?? '');
    $fasilitas     = trim($_POST['fasilitas'] ?? '');
    $harga_bulanan = $_POST['harga_bulanan'] ?? '';
    $kapasitas     = $_POST['kapasitas'] ?? '';
    $tipe_kamar    = trim($_POST['tipe_kamar'] ?? 'standar');
    $status        = trim($_POST['status'] ?? 'Kosong');

    if ($nomor_kamar === '') {
        $errors[] = "Nomor kamar wajib diisi.";
    }
    if ($fasilitas === '') {
        $errors[] = "Fasilitas wajib diisi.";
    }
    if (!is_numeric($harga_bulanan) || $harga_bulanan <= 0) {
        $errors[] = "Harga bulanan harus angka valid.";
    }
    if (!is_numeric($kapasitas) || $kapasitas < 1) {
        $errors[] = "Kapasitas minimal 1 orang.";
    }

    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare(
                "UPDATE kamar_09 SET nomor_kamar = :nomor, fasilitas = :fasilitas,
                 harga_bulanan = :harga, kapasitas = :kapasitas, tipe_kamar = :tipe, status = :status
                 WHERE id = :id"
            );
            $stmt->execute([
                'nomor'     => $nomor_kamar,
                'fasilitas' => $fasilitas,
                'harga'     => (int) $harga_bulanan,
                'kapasitas' => (int) $kapasitas,
                'tipe'      => $tipe_kamar,
                'status'    => $status,
                'id'        => $id,
            ]);

            session_start();
            $_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Data kamar berhasil diperbarui.'];
            header('Location: list.php');
            exit;
        } catch (PDOException $e) {
            $errors[] = "Gagal memperbarui: " . $e->getMessage();
        }
    }
}

$stmt = $pdo->prepare("SELECT * FROM kamar_09 WHERE id = :id");
$stmt->execute(['id' => $id]);
$kamar = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$kamar) {
    header('Location: list.php');
    exit;
}

include __DIR__ . '/../includes/header.php';
?>
        <section>
            <h2>Edit Data Kamar</h2>

            <?php if (!empty($errors)): ?>
                <div class="flash flash-error">
                    <?php echo implode('<br>', array_map('htmlspecialchars', $errors)); ?>
                </div>
            <?php endif; ?>

            <form id="form-tambah" method="post" action="">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($kamar['id']); ?>">
                <p>
                    <label for="nomor_kamar">Nomor Kamar</label><br>
                    <input type="text" id="nomor_kamar" name="nomor_kamar" value="<?php echo htmlspecialchars($kamar['nomor_kamar']); ?>" required>
                </p>
                <p>
                    <label for="tipe_kamar">Tipe Kamar</label><br>
                    <select id="tipe_kamar" name="tipe_kamar">
                        <?php foreach (['standar' => 'Standar', 'deluxe' => 'Deluxe', 'vip' => 'VIP'] as $value => $label): ?>
                        <option value="<?php echo $value; ?>" <?php echo $kamar['tipe_kamar'] === $value ? 'selected' : ''; ?>><?php echo $label; ?></option>
                        <?php endforeach; ?>
                    </select>
                </p>
                <p>
                    <label for="fasilitas">Fasilitas</label><br>
                    <input type="text" id="fasilitas" name="fasilitas" value="<?php echo htmlspecialchars($kamar['fasilitas']); ?>" required>
                </p>
                <p>
                    <label for="harga_bulanan">Harga per Bulan (Rp)</label><br>
                    <input type="number" id="harga_bulanan" name="harga_bulanan" min="100000" value="<?php echo htmlspecialchars($kamar['harga_bulanan']); ?>" required>
                </p>
                <p>
                    <label for="kapasitas">Kapasitas (Orang)</label><br>
                    <input type="number" id="kapasitas" name="kapasitas" min="1" value="<?php echo htmlspecialchars($kamar['kapasitas']); ?>" required>
                </p>
                <p>
                    <label for="status">Status</label><br>
                    <select id="status" name="status">
                        <option value="Kosong" <?php echo $kamar['status'] === 'Kosong' ? 'selected' : ''; ?>>Kosong</option>
                        <option value="Terisi" <?php echo $kamar['status'] === 'Terisi' ? 'selected' : ''; ?>>Terisi</option>
                    </select>
                </p>
                <p>
                    <button type="submit">Update</button>
                </p>
            </form>
        </section>
<?php include __DIR__ . '/../includes/footer.php'; ?>