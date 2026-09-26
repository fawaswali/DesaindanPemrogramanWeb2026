<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$__jobsheetRoot = dirname(__DIR__);
$__scriptDir = dirname($_SERVER['SCRIPT_FILENAME'] ?? __FILE__);
$__rel = ltrim(str_replace('\\', '/', substr($__scriptDir, strlen($__jobsheetRoot))), '/');
$base = $__rel === '' ? '' : str_repeat('../', substr_count($__rel, '/') + 1);
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