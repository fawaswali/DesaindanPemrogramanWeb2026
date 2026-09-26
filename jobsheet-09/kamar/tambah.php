<?php
$page_title = "Tambah Kamar";
require_once __DIR__ . '/../includes/koneksi.php';

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
        $errors[] = "Harga bulanan harus angka valid di atas 0.";
    }
    if (!is_numeric($kapasitas) || $kapasitas < 1) {
        $errors[] = "Kapasitas minimal 1 orang.";
    }

    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare(
                "INSERT INTO kamar_09 (nomor_kamar, fasilitas, harga_bulanan, kapasitas, tipe_kamar, status)
                 VALUES (:nomor, :fasilitas, :harga, :kapasitas, :tipe, :status)"
            );
            $stmt->execute([
                'nomor'     => $nomor_kamar,
                'fasilitas' => $fasilitas,
                'harga'     => (int) $harga_bulanan,
                'kapasitas' => (int) $kapasitas,
                'tipe'      => $tipe_kamar,
                'status'    => $status,
            ]);

            session_start();
            $_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Kamar berhasil ditambahkan.'];
            header('Location: list.php');
            exit;
        } catch (PDOException $e) {
            $errors[] = "Gagal menyimpan: " . $e->getMessage();
        }
    }
}

include __DIR__ . '/../includes/header.php';
?>
        <section>
            <h2>Tambah Kamar Baru</h2>

            <?php if (!empty($errors)): ?>
                <div class="flash flash-error">
                    <?php echo implode('<br>', array_map('htmlspecialchars', $errors)); ?>
                </div>
            <?php endif; ?>

            <form id="form-tambah" method="post" action="">
                <p>
                    <label for="nomor_kamar">Nomor Kamar</label><br>
                    <input type="text" id="nomor_kamar" name="nomor_kamar" placeholder="Contoh: A-101" required>
                </p>
                <p>
                    <label for="tipe_kamar">Tipe Kamar</label><br>
                    <select id="tipe_kamar" name="tipe_kamar">
                        <option value="standar">Standar</option>
                        <option value="deluxe">Deluxe</option>
                        <option value="vip">VIP</option>
                    </select>
                </p>
                <p>
                    <label for="fasilitas">Fasilitas</label><br>
                    <input type="text" id="fasilitas" name="fasilitas" placeholder="Contoh: Kasur, Lemari, WiFi, AC" required>
                </p>
                <p>
                    <label for="harga_bulanan">Harga per Bulan (Rp)</label><br>
                    <input type="number" id="harga_bulanan" name="harga_bulanan" min="100000" placeholder="Contoh: 850000" required>
                </p>
                <p>
                    <label for="kapasitas">Kapasitas (Orang)</label><br>
                    <input type="number" id="kapasitas" name="kapasitas" min="1" value="1" required>
                </p>
                <p>
                    <label for="status">Status</label><br>
                    <select id="status" name="status">
                        <option value="Kosong">Kosong</option>
                        <option value="Terisi">Terisi</option>
                    </select>
                </p>
                <p>
                    <button type="submit">Simpan</button>
                </p>
            </form>
        </section>
<?php include __DIR__ . '/../includes/footer.php'; ?>