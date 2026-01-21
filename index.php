<?php
header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['REQUEST_URI'];

$response = [
    "service" => "Simple PHP API",
    "status" => "running",
    "method" => $method,
    "data" => []
];

if ($method === 'GET') {
    $response["data"] = [
        "id" => 1,
        "name" => "Demo Product",
        "price" => 99.99,
        "currency" => "USD"
    ];
} else {
    http_response_code(405);
    $response["error"] = "Method not allowed";
}

echo json_encode($response, JSON_PRETTY_PRINT);
