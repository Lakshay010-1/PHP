<?php

require_once __DIR__ . '/../vendor/autoload.php';


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$requiredEnv = ['DB_SERVER', 'DB_PORT', 'DB_NAME', 'DB_PASSWORD', 'DB_USER'];

foreach ($requiredEnv as $field) {
    if (empty($_ENV[$field])) {
        throw new Exception("Missing environment variable: {$field}");
    }
}

$server = $_ENV['DB_SERVER'];
$port = $_ENV['DB_PORT'];
$database = $_ENV['DB_NAME'];
$password = $_ENV['DB_PASSWORD'];
$username = $_ENV['DB_USER'];


$dsn = "sqlsrv:Server={$server},{$port};Database={$database}";

try {

    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    error_log("Database connection failed: " . $e->getMessage());
    throw new Exception("Database connection failed");
}
