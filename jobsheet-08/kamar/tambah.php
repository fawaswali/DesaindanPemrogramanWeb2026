<?php
$page_title = "Tambah Kamar";
require_once __DIR__ . '/../includes/koneksi.php';

$error = null;

// Proses simpan data kamar saat form disubmit
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nomor_kamar   = trim($_POST['nomor_kamar'] ?? '');
    $tipe_kamar    = trim($_POST['tipe_kamar'] ?? '');
    $fasilitas     = trim($_POST['fasilitas'] ?? '');
    $harga_bulanan = trim($_POST['harga_bulanan'] ?? '');
    $status        = trim($_POST['status'] ?? 'Tersedia');

    if ($nomor_kamar === '' || $tipe_kamar === '' || $harga_bulanan === '') {
        $error = 'Nomor kamar, tipe, dan harga wajib diisi!';
    } else {
        try {
            $stmt = $pdo->prepare(
                "INSERT INTO kamar (nomor_kamar, tipe_kamar, fasilitas, harga_bulanan, status) 
                 VALUES (:nomor_kamar, :tipe_kamar, :fasilitas, :harga_bulanan, :status)"
            );

            $stmt->execute([
                'nomor_kamar'   => $nomor_kamar,
                'tipe_kamar'    => $tipe_kamar,
                'fasilitas'     => $fasilitas,
                'harga_bulanan' => (int) $harga_bulanan,
                'status'        => $status,
            ]);

            session_start();
            $_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Kamar berhasil ditambahkan.'];
            header('Location: list.php');
            exit;
        } catch (PDOException $e) {
            $error = 'Gagal menyimpan data kamar: ' . $e->getMessage();
        }
    }
}

require_once __DIR__ . '/../includes/header.php';
?>

<div class="container" style="max-width: 600px; margin: 0 auto;">
    <h2>Tambah Kamar Baru</h2>

    <?php if ($error): ?>
        <div class="flash flash-error">
            <?php echo htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>

    <form action="" method="POST">
        <p>
            <label for="nomor_kamar">Nomor Kamar</label>
            <input type="text" id="nomor_kamar" name="nomor_kamar" placeholder="Contoh: A-01" required>
        </p>

        <p>
            <label for="tipe_kamar">Tipe Kamar</label>
            <select id="tipe_kamar" name="tipe_kamar" required>
                <option value="">-- Pilih Tipe --</option>
                <option value="Standar">Standar</option>
                <option value="Superior">Superior</option>
                <option value="Deluxe">Deluxe</option>
                <option value="VIP">VIP</option>
            </select>
        </p>

        <p>
            <label for="fasilitas">Fasilitas</label>
            <input type="text" id="fasilitas" name="fasilitas" placeholder="Contoh: Kasur, Lemari, AC, Wi-Fi">
        </p>

        <p>
            <label for="harga_bulanan">Harga / Bulan (Rp)</label>
            <input type="number" id="harga_bulanan" name="harga_bulanan" placeholder="Contoh: 850000" required>
        </p>

        <p>
            <label for="status">Status Kamar</label>
            <select id="status" name="status">
                <option value="Tersedia" selected>Tersedia</option>
                <option value="Terisi">Terisi</option>
                <option value="Perbaikan">Perbaikan</option>
            </select>
        </p>

        <button type="submit" style="width: 100%; margin-top: 10px;">Simpan Kamar</button>
    </form>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>