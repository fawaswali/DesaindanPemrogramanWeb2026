<?php
session_start();
require __DIR__ . '/../includes/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: list.php');
    exit;
}

$id = $_POST['id'] ?? null;
if ($id) {
    $cek = $pdo->prepare("SELECT id_kamar FROM penghuni_09 WHERE id = :id");
    $cek->execute(['id' => $id]);
    $id_kamar = $cek->fetchColumn();

    $stmt = $pdo->prepare("DELETE FROM penghuni_09 WHERE id = :id");
    $stmt->execute(['id' => $id]);

    if ($id_kamar) {
        $cekSisa = $pdo->prepare("SELECT COUNT(*) FROM penghuni_09 WHERE id_kamar = :id");
        $cekSisa->execute(['id' => $id_kamar]);
        if ($cekSisa->fetchColumn() == 0) {
            $pdo->prepare("UPDATE kamar_09 SET status = 'Kosong' WHERE id = :id")->execute(['id' => $id_kamar]);
        }
    }

    $_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Penghuni berhasil dihapus.'];
}

header('Location: list.php');
exit;