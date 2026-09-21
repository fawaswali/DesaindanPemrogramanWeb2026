<?php
session_start();
require __DIR__ . '/../includes/koneksi.php';

$nik        = trim($_POST['nik'] ?? '');
$nama       = trim($_POST['nama'] ?? '');
$no_telepon = trim($_POST['no_telepon'] ?? '');
$pekerjaan  = trim($_POST['pekerjaan'] ?? '');

if ($nik === '' || $nama === '' || $no_telepon === '') {
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => 'Semua kolom wajib diisi!'];
    header('Location: tambah.php');
    exit;
}

$stmt = $pdo->prepare(
    "INSERT INTO penghuni (nik, nama, no_telepon, pekerjaan) 
     VALUES (:nik, :nama, :no_telepon, :pekerjaan) 
     RETURNING id"
);

$stmt->execute([
    'nik'        => $nik,
    'nama'       => $nama,
    'no_telepon' => $no_telepon,
    'pekerjaan'  => $pekerjaan,
]);

$_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Data penghuni berhasil disimpan.'];
header('Location: list.php');
exit;