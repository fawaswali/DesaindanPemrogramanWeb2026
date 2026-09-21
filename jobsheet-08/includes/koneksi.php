<?php
$host = getenv('DB_HOST') ?: "localhost";
$port = getenv('DB_PORT') ?: "5432";
$db   = getenv('DB_NAME') ?: "simpus_mini";
$user = getenv('DB_USER') ?: "postgres";
$pass = getenv('DB_PASS') ?: "postgres";

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$db";
    
    
    if ($host !== 'localhost') {
        $dsn .= ";sslmode=require";
    }

    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}