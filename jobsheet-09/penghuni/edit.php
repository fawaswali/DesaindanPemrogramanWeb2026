<?php
$page_title = "Edit Penghuni";
require_once __DIR__ . '/../includes/koneksi.php';

$id = $_GET['id'] ?? $_POST['id'] ?? null;
if (!$id) {
    header('Location: list.php');
    exit;
}

$errors = [];

$stmt = $pdo->prepare("SELECT * FROM penghuni_09 WHERE id = :id");
$stmt->execute(['id' => $id]);
$penghuni = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$penghuni) {
    header('Location: list.php');
    exit;
}

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
            $kamarLama = $penghuni['id_kamar'];

            $stmt = $pdo->prepare(
                "UPDATE penghuni_09 SET nama = :nama, nik = :nik,
                 alamat = :alamat, no_hp = :no_hp, id_kamar = :id_kamar WHERE id = :id"
            );
            $stmt->execute([
                'nama'     => $nama,
                'nik'      => $nik,
                'alamat'   => $alamat,
                'no_hp'    => $no_hp,
                'id_kamar' => $id_kamar,
                'id'       => $id,
            ]);

            // Sinkronisasi status kamar jika berganti kamar
            if ($kamarLama && $kamarLama != $id_kamar) {
                $cekKamarLama = $pdo->prepare("SELECT COUNT(*) FROM penghuni_09 WHERE id_kamar = :id");
                $cekKamarLama->execute(['id' => $kamarLama]);
                if ($cekKamarLama->fetchColumn() == 0) {
                    $pdo->prepare("UPDATE kamar_09 SET status = 'Kosong' WHERE id = :id")->execute(['id' => $kamarLama]);
                }
            }
            if ($id_kamar) {
                $pdo->prepare("UPDATE kamar_09 SET status = 'Terisi' WHERE id = :id")->execute(['id' => $id_kamar]);
            }

            session_start();
            $_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Data penghuni berhasil diperbarui.'];
            header('Location: list.php');
            exit;
        } catch (PDOException $e) {
            $errors[] = "Gagal memperbarui: " . $e->getMessage();
        }
    }
}

include __DIR__ . '/../includes/header.php';
?>
        <section>
            <h2>Edit Data Penghuni</h2>

            <?php if (!empty($errors)): ?>
                <div class="flash flash-error">
                    <?php echo implode('<br>', array_map('htmlspecialchars', $errors)); ?>
                </div>
            <?php endif; ?>

            <form id="form-tambah" method="post" action="">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($penghuni['id']); ?>">
                <p>
                    <label for="nama">Nama Lengkap</label><br>
                    <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($penghuni['nama']); ?>" required>
                </p>
                <p>
                    <label for="nik">NIK</label><br>
                    <input type="text" id="nik" name="nik" value="<?php echo htmlspecialchars($penghuni['nik']); ?>" required>
                </p>
                <p>
                    <label for="id_kamar">Pilih Kamar Kost</label><br>
                    <select id="id_kamar" name="id_kamar">
                        <option value="">-- Belum Memilih Kamar --</option>
                        <?php foreach ($kamarOptions as $k): ?>
                            <option value="<?php echo $k['id']; ?>" <?php echo $penghuni['id_kamar'] == $k['id'] ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($k['nomor_kamar'] . ' (' . ucfirst($k['tipe_kamar']) . ')'); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </p>
                <p>
                    <label for="alamat">Alamat Asal / Instansi</label><br>
                    <input type="text" id="alamat" name="alamat" value="<?php echo htmlspecialchars($penghuni['alamat']); ?>">
                </p>
                <p>
                    <label for="no_hp">No. Telepon / WhatsApp</label><br>
                    <input type="text" id="no_hp" name="no_hp" value="<?php echo htmlspecialchars($penghuni['no_hp']); ?>">
                </p>
                <p>
                    <button type="submit">Update</button>
                </p>
            </form>
        </section>
<?php include __DIR__ . '/../includes/footer.php'; ?>