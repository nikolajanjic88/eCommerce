<?php

session_start();

const BASE_PATH = __DIR__ . "/../";

require_once BASE_PATH . "app/functions.php";

spl_autoload_register(function($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require_once(BASE_PATH . "{$class}.php");
});

use App\Router;

$router = new Router();

require_once BASE_PATH . "routes.php";
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$router->route($uri, $method);