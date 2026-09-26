<?php
// Set default header agar browser tidak memperlakukan output sebagai file download
header('Content-Type: text/html; charset=UTF-8');

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$targetFile = dirname(__DIR__) . $requestUri;

if (is_dir($targetFile)) {
    $targetFile = rtrim($targetFile, '/') . '/index.php';
}

if (file_exists($targetFile) && pathinfo($targetFile, PATHINFO_EXTENSION) === 'php') {
    chdir(dirname($targetFile));
    require $targetFile;
    exit;
}

http_response_code(404);
echo "Halaman tidak ditemukan.";