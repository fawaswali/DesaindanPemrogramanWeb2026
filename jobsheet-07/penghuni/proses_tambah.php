<?php
require_once __DIR__ . '/../includes/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = trim($_POST['nama'] ?? '');
    $no_hp = trim($_POST['no_hp'] ?? '');
    $id_kamar = (int)($_POST['id_kamar'] ?? 0);
    $tanggal_masuk = trim($_POST['tanggal_masuk'] ?? date('Y-m-d'));

    $stmt = $pdo->prepare("INSERT INTO penghuni (nik, nama, no_telepon, pekerjaan) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nik, $nama, $no_telepon, $pekerjaan]);

    header("Location: list.php");
    exit;
}