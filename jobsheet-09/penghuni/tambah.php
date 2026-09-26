<?php
$page_title = "Tambah Penghuni";
require_once __DIR__ . '/../includes/koneksi.php';

$errors = [];

// Ambil pilihan kamar dari tabel kamar_09
$kamarOptions = $pdo->query("SELECT id, nomor_kamar, tipe_kamar, status FROM kamar_09 ORDER BY nomor_kamar ASC")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama     = trim($_POST['nama'] ?? '');
    $nik      = trim($_POST['nik'] ?? '');
    $alamat   = trim($_POST['alamat'] ?? '');
    $no_hp    = trim($_POST['no_hp'] ?? '');
    $id_kamar = !empty($_POST['id_kamar']) ? (int)$_POST['id_kamar'] : null;

    if ($nama === '') {
        $errors[] = "Nama wajib diisi.";
    }
    if ($nik === '') {
        $errors[] = "NIK wajib diisi.";
    }

    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare(
                "INSERT INTO penghuni_09 (nama, nik, alamat, no_hp, id_kamar)
                 VALUES (:nama, :nik, :alamat, :no_hp, :id_kamar)"
            );
            $stmt->execute([
                'nama'     => $nama,
                'nik'      => $nik,
                'alamat'   => $alamat,
                'no_hp'    => $no_hp,
                'id_kamar' => $id_kamar,
            ]);

            // Jika kamar dipilih, tandai status kamar tersebut menjadi 'Terisi'
            if ($id_kamar) {
                $updateKamar = $pdo->prepare("UPDATE kamar_09 SET status = 'Terisi' WHERE id = :id");
                $updateKamar->execute(['id' => $id_kamar]);
            }

            session_start();
            $_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Penghuni berhasil ditambahkan.'];
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
            <h2>Tambah Penghuni Baru</h2>

            <?php if (!empty($errors)): ?>
                <div class="flash flash-error">
                    <?php echo implode('<br>', array_map('htmlspecialchars', $errors)); ?>
                </div>
            <?php endif; ?>

            <form id="form-tambah" method="post" action="">
                <p>
                    <label for="nama">Nama Lengkap</label><br>
                    <input type="text" id="nama" name="nama" required>
                </p>
                <p>
                    <label for="nik">NIK (Nomor Induk Kependudukan)</label><br>
                    <input type="text" id="nik" name="nik" required>
                </p>
                <p>
                    <label for="id_kamar">Pilih Kamar Kost</label><br>
                    <select id="id_kamar" name="id_kamar">
                        <option value="">-- Belum Memilih Kamar --</option>
                        <?php foreach ($kamarOptions as $k): ?>
                            <option value="<?php echo $k['id']; ?>">
                                <?php echo htmlspecialchars($k['nomor_kamar'] . ' (' . ucfirst($k['tipe_kamar']) . ' - ' . $k['status'] . ')'); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </p>
                <p>
                    <label for="alamat">Alamat Asal / Instansi</label><br>
                    <input type="text" id="alamat" name="alamat">
                </p>
                <p>
                    <label for="no_hp">No. Telepon / WhatsApp</label><br>
                    <input type="text" id="no_hp" name="no_hp">
                </p>
                <p>
                    <button type="submit">Simpan</button>
                </p>
            </form>
        </section>
<?php include __DIR__ . '/../includes/footer.php'; ?>