<?php
// Conexión para Railway (MySQL)
$host = $_ENV['MYSQLHOST'] ?? 'localhost';
$user = $_ENV['MYSQLUSER'] ?? 'root';
$pass = $_ENV['MYSQLPASSWORD'] ?? '';
$db   = $_ENV['MYSQLDATABASE'] ?? 'railway';
$port = $_ENV['MYSQLPORT'] ?? '3306';

$conn = new mysqli($host, $user, $pass, $db, $port);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Rutas para uploads (solo para desarrollo local)
// En Railway, no puedes guardar archivos subidos, así que usa URLs externas o deja vacío
define('BASE_URL', 'http://' . ($_SERVER['HTTP_HOST'] ?? 'localhost') . '/');
define('UPLOADS_URL', BASE_URL . 'uploads/');
define('UPLOADS_PATH', __DIR__ . '/uploads/');
?>