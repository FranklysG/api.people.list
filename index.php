<?php


define('BASE_URL', 'http://localhost');

header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/routes/routes.php';

// obtenha a URI da requisição
$methods = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// verifique se a rota existe
if (array_key_exists($methods.':'.$uri, $routes)) {
    $data = [];
    
    if ($methods != 'GET') {
        $data = json_decode(file_get_contents('php://input'), true);
    }

    $controller = $routes[$methods.':'.$uri][0];
    $method = $routes[$methods.':'.$uri][1];
    echo $controller->$method($data);
} else {
    // exiba uma mensagem de erro
    header("HTTP/1.1 404 Not Found");
    echo "404 Not Found";
}
