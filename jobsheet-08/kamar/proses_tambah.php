<?php
session_start();
require __DIR__ . '/../includes/koneksi.php';

$nomor_kamar   = trim($_POST['nomor_kamar'] ?? '');
$tipe_kamar    = trim($_POST['tipe_kamar'] ?? '');
$fasilitas     = trim($_POST['fasilitas'] ?? '');
$harga_bulanan = trim($_POST['harga_bulanan'] ?? '');
$status        = trim($_POST['status'] ?? 'Tersedia');

if ($nomor_kamar === '' || $tipe_kamar === '' || $harga_bulanan === '') {
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => 'Nomor kamar, tipe, dan harga wajib diisi!'];
    header('Location: tambah.php');
    exit;
}

$stmt = $pdo->prepare(
    "INSERT INTO kamar (nomor_kamar, tipe_kamar, fasilitas, harga_bulanan, status) 
     VALUES (:nomor_kamar, :tipe_kamar, :fasilitas, :harga_bulanan, :status) 
     RETURNING id"
);

$stmt->execute([
    'nomor_kamar'   => $nomor_kamar,
    'tipe_kamar'    => $tipe_kamar,
    'fasilitas'     => $fasilitas,
    'harga_bulanan' => (int) $harga_bulanan,
    'status'        => $status,
]);

$_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Kamar berhasil ditambahkan.'];
header('Location: list.php');
exit;