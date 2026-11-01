<?php

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

header('Content-Type: application/json');

// CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_SERVER['REQUEST_URI']) {
    http_response_code(200);
    echo json_encode([
        'message' => 'Status: API running'
    ]);
    exit;
}

if (str_starts_with(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/api')) {
    require_once __DIR__ . '/../routes/index.php';
    exit;
}

http_response_code(404);

echo json_encode([
    'message' => 'Route not found'
]);
