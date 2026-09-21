<?php
require_once __DIR__ . '/../includes/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nomor_kamar = trim($_POST['nomor_kamar'] ?? '');
    $tipe_kamar = trim($_POST['tipe_kamar'] ?? '');
    $harga = (int)($_POST['harga'] ?? 0);
    $status = trim($_POST['status'] ?? 'Kosong');

    $stmt = $pdo->prepare("INSERT INTO kamar (nomor_kamar, tipe_kamar, harga, status) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nomor_kamar, $tipe_kamar, $harga, $status]);

    header("Location: list.php");
    exit;
}