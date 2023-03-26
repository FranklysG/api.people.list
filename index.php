<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
header('Access-Control-Allow-Credentials: true');


if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, Authorization');
    header('Access-Control-Max-Age: 86400');
    header('Content-Length: 0');
    header('Content-Type: text/plain');
    exit();
}
// $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
// if ($contentType === "application/json") {
//   header("Content-Type: application/json");
// } else if ($contentType === "application/x-www-form-urlencoded") {
//   header("Content-Type: application/x-www-form-urlencoded");
// } else {
// }

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/routes/routes.php';

// obtenha a URI da requisição
$methods = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// verifique se a rota existe
if (array_key_exists($methods . ':' . $uri, $routes)) {
    $data = [];

    if ($methods != 'GET') {
        $data = json_decode(file_get_contents('php://input'), true);
    }

    $controller = $routes[$methods . ':' . $uri][0];
    $method = $routes[$methods . ':' . $uri][1];
    echo $controller->$method($data);
} else {
    // exiba uma mensagem de erro
    header("HTTP/1.1 404 Not Found");
    echo "404 Not Found";
}
