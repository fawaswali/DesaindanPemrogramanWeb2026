<?php
// jobsheet-07/includes/header.php
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $pageTitle ?? 'Sistem Kost Papa' ?></title>
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
      background-color: #0b1329;
      color: #f1f5f9;
      padding: 1.5rem;
    }
    .wrapper { max-width: 1050px; margin: 0 auto; }
    .navbar {
      background-color: #0d1b3e;
      border: 1px solid #1e293b;
      border-radius: 10px;
      padding: 1rem 1.5rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1.5rem;
      flex-wrap: wrap;
      gap: 0.75rem;
    }
    .brand { font-size: 1.3rem; font-weight: 700; color: #38bdf8; text-decoration: none; }
    .nav-buttons { display: flex; gap: 0.5rem; flex-wrap: wrap; }
    .nav-btn {
      color: #cbd5e1;
      text-decoration: none;
      font-size: 0.85rem;
      font-weight: 500;
      padding: 0.5rem 0.9rem;
      border-radius: 6px;
      background: #132247;
      border: 1px solid #1e293b;
      transition: all 0.2s ease;
    }
    .nav-btn:hover { background: #0284c7; color: #fff; border-color: #38bdf8; }
    .card-box {
      background-color: #0f1d40;
      border: 1px solid #1e293b;
      border-radius: 10px;
      padding: 1.75rem;
    }
    h2 { font-size: 1.4rem; color: #ffffff; margin-bottom: 1.25rem; }
    table { width: 100%; border-collapse: collapse; margin-top: 1rem; }
    th, td { padding: 0.75rem 1rem; text-align: left; border-bottom: 1px solid #1e293b; font-size: 0.9rem; }
    th { background: #09132b; color: #38bdf8; }
    tr:hover { background: rgba(255, 255, 255, 0.02); }
    .btn-action {
      display: inline-block;
      padding: 0.4rem 0.8rem;
      background: #0284c7;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
      font-size: 0.8rem;
      font-weight: 600;
      border: none;
      cursor: pointer;
    }
    .form-group { margin-bottom: 1rem; }
    label { display: block; font-size: 0.85rem; margin-bottom: 0.35rem; color: #cbd5e1; }
    input, select {
      width: 100%;
      padding: 0.65rem;
      background: #09132b;
      border: 1px solid #1e293b;
      border-radius: 6px;
      color: #fff;
      outline: none;
    }
    input:focus, select:focus { border-color: #38bdf8; }
  </style>
</head>
<body>
<div class="wrapper">
  <header class="navbar">
    <a href="/jobsheet-07/index.php" class="brand">Sistem Kost Papa</a>
    <nav class="nav-buttons">
      <a href="/jobsheet-07/index.php" class="nav-btn">Beranda</a>
      <a href="/jobsheet-07/kamar/list.php" class="nav-btn">Daftar Kamar</a>
      <a href="/jobsheet-07/kamar/tambah.php" class="nav-btn">Tambah Kamar</a>
      <a href="/jobsheet-07/penghuni/list.php" class="nav-btn">Daftar Penghuni</a>
      <a href="/jobsheet-07/penghuni/tambah.php" class="nav-btn">Tambah Penghuni</a>
      <a href="/index.html" class="nav-btn">Portal</a>
    </nav>
  </header>