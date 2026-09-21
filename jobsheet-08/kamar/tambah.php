<?php
$page_title = "Tambah Kamar";
include __DIR__ . '/../includes/header.php';
?>
<section>
    <h2>Tambah Kamar Baru</h2>
    <form action="proses_tambah.php" method="POST">
        <label>Nomor Kamar</label><br>
        <input type="text" name="nomor_kamar" placeholder="Contoh: A-01" required><br><br>

        <label>Tipe Kamar</label><br>
        <input type="text" name="tipe_kamar" placeholder="Contoh: Kamar Mandi Dalam" required><br><br>

        <label>Fasilitas</label><br>
        <input type="text" name="fasilitas" placeholder="Contoh: Kasur, Lemari, AC, Wi-Fi" required><br><br>

        <label>Harga Bulanan (Rp)</label><br>
        <input type="number" name="harga_bulanan" placeholder="Contoh: 850000" required><br><br>

        <label>Status</label><br>
        <select name="status">
            <option value="Tersedia">Tersedia</option>
            <option value="Terisi">Terisi</option>
        </select><br><br>

        <button type="submit">Simpan Kamar</button>
    </form>
</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>