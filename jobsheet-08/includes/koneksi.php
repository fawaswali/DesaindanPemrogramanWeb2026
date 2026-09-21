<?php
$host = getenv('DB_HOST') ?: 'aws-0-ap-southeast-1.pooler.supabase.com';
$port = getenv('DB_PORT') ?: '6543';
$dbname = getenv('DB_NAME') ?: 'postgres';
$user = getenv('DB_USER') ?: 'postgres.mpycrxqzjfmqqafoxpew';
$password = getenv('DB_PASS') ?: 'password_asli_supabase_kamu';

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
    
    if ($host !== 'localhost') {
        $dsn .= ";sslmode=require";
    }

    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}