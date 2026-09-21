<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? 'Kost Mini'; ?></title>
    <link rel="stylesheet" href="<?php echo $base ?? '/jobsheet-08/'; ?>assets/css/style.css">
</head>
<body>
    <header>
        <div class="logo">Sistem Kost Mini</div>
        <nav>
            <a href="<?php echo $base ?? '/jobsheet-08/'; ?>index.php">Beranda</a>
            <a href="<?php echo $base ?? '/jobsheet-08/'; ?>kamar/list.php">Daftar Kamar</a>
            <a href="<?php echo $base ?? '/jobsheet-08/'; ?>kamar/tambah.php">Tambah Kamar</a>
            <a href="<?php echo $base ?? '/jobsheet-08/'; ?>penghuni/list.php">Daftar Penghuni</a>
            <a href="<?php echo $base ?? '/jobsheet-08/'; ?>penghuni/tambah.php">Tambah Penghuni</a>
        </nav>
    </header>
    <main class="container">