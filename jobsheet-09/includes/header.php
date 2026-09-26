<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Gunakan REQUEST_URI untuk menghitung kedalaman path secara akurat di Vercel
$currentUri = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH);

// Jika sedang berada di dalam subfolder (kamar/ atau penghuni/), mundur 1 tingkat (../)
if (strpos($currentUri, '/kamar/') !== false || strpos($currentUri, '/penghuni/') !== false) {
    $base = '../';
} else {
    $base = '';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kost Papa<?php echo isset($page_title) ? ' | ' . htmlspecialchars($page_title) : ''; ?></title>
    <link rel="stylesheet" href="<?php echo $base; ?>assets/css/style.css">
</head>
<body>
    <header>
        <h1>Kost Papa</h1>
        <button type="button" id="nav-toggle-btn" class="nav-toggle-label" aria-label="Menu">&#9776;</button>
        <nav>
            <ul>
                <li><a href="<?php echo $base; ?>index.php">Beranda</a></li>
                <li><a href="<?php echo $base; ?>kamar/list.php">Daftar Kamar</a></li>
                <li><a href="<?php echo $base; ?>kamar/tambah.php">Tambah Kamar</a></li>
                <li><a href="<?php echo $base; ?>penghuni/list.php">Daftar Penghuni</a></li>
                <li><a href="<?php echo $base; ?>penghuni/tambah.php">Tambah Penghuni</a></li>
            </ul>
        </nav>
    </header>

    <main>