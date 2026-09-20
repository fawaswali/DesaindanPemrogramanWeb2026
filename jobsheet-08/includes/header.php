<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Normalisasi pemisah path agar kompatibel di Windows maupun Linux/Mac
$rootPath = str_replace('\\', '/', realpath(dirname(__DIR__)));
$scriptPath = str_replace('\\', '/', realpath(dirname($_SERVER['SCRIPT_FILENAME'])));

// Hitung selisih kedalaman folder dari root proyek
$relPath = trim(str_replace($rootPath, '', $scriptPath), '/');

if ($relPath === '') {
    $base = '';
} else {
    // Menghasilkan '../' untuk 1 tingkat subfolder (misal: /buku/ atau /anggota/)
    $depth = count(explode('/', $relPath));
    $base = str_repeat('../', $depth);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIMPUS-Mini<?php echo isset($page_title) ? ' | ' . $page_title : ''; ?></title>
    <link rel="stylesheet" href="<?php echo $base; ?>assets/css/style.css">
</head>
<body>
    <header>
        <h1>SIMPUS-Mini</h1>
        <button type="button" id="nav-toggle-btn" class="nav-toggle-label" aria-label="Menu">&#9776;</button>
        <nav>
            <ul>
                <li><a href="<?php echo $base; ?>index.php">Beranda</a></li>
                <li><a href="<?php echo $base; ?>buku/list.php">Daftar Buku</a></li>
                <li><a href="<?php echo $base; ?>buku/tambah.php">Tambah Buku</a></li>
                <li><a href="<?php echo $base; ?>anggota/list.php">Daftar Anggota</a></li>
                <li><a href="<?php echo $base; ?>anggota/tambah.php">Tambah Anggota</a></li>
            </ul>
        </nav>
    </header>

    <main>