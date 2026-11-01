<?php

$requestMethod = $_SERVER['REQUEST_METHOD'];

$requestPath = $_SERVER['REQUEST_URI'];

$path = preg_replace('#^/api#', '', $requestPath);

$path = rtrim($path, '/');

if ($path == '') {
    $path = '/';
}


if (str_starts_with($path, '/auth')) {
    require_once __DIR__ . "/auth.php";
    exit;
}

if (str_starts_with($path, '/nfc')) {
    require_once __DIR__ . "/nfc.php";
    exit;
}

if (str_starts_with($path, '/users')) {
    require_once __DIR__ . "/user.php";
    exit;
}

http_response_code(404);

echo json_encode([
    'message' => 'API route not found'
]);
