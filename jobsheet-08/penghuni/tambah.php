<?php
$page_title = "Tambah Penghuni";
include __DIR__ . '/../includes/header.php';
?>
<section>
    <h2>Pendaftaran Penghuni Kost</h2>
    <form action="proses_tambah.php" method="POST">
        <label>NIK (KTP)</label><br>
        <input type="text" name="nik" placeholder="Contoh: 3507123456780001" required><br><br>

        <label>Nama Lengkap</label><br>
        <input type="text" name="nama" placeholder="Contoh: Ahmad Fauzi" required><br><br>

        <label>Nomor HP / WhatsApp</label><br>
        <input type="text" name="no_telepon" placeholder="Contoh: 081234567890" required><br><br>

        <label>Status / Pekerjaan</label><br>
        <input type="text" name="pekerjaan" placeholder="Contoh: Mahasiswa / Karyawan" required><br><br>

        <button type="submit">Simpan Data Penghuni</button>
    </form>
</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>