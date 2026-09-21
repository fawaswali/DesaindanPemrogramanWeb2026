<?php
// jobsheet-07/includes/header.php
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $pageTitle ?? 'Sistem Kost Papa' ?></title>
  <link rel="stylesheet" href="/jobsheet-07/assets/css/style.css">
</head>
<body>
<div class="wrapper">
  <header class="navbar">
    <a href="/jobsheet-07/index.php" class="brand">Kost Papa</a>
    <nav class="nav-buttons">
      <a href="/jobsheet-07/index.php" class="nav-btn">Beranda</a>
      <a href="/jobsheet-07/kamar/list.php" class="nav-btn">Daftar Kamar</a>
      <a href="/jobsheet-07/kamar/tambah.php" class="nav-btn">Tambah Kamar</a>
      <a href="/jobsheet-07/penghuni/list.php" class="nav-btn">Daftar Penghuni</a>
      <a href="/jobsheet-07/penghuni/tambah.php" class="nav-btn">Tambah Penghuni</a>
    </nav>
  </header>