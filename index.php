<?php
require_once __DIR__ . '/vendor/autoload.php';

$uri = $_SERVER['REQUEST_URI'];
$uri = parse_url($uri, PHP_URL_PATH);

$path = explode('/', $uri);
print_r($path);
$page = $path[2] ?? 'home';
$controllerName = ucfirst(strtolower($page)) . 'Controller';
$methodName = isset($path[3]) ? strtolower($path[3]) : 'index';
$params = array_slice($path, 3);
echo $controllerName . " " . $methodName;

$controllerClass = 'App\\Controllers\\' . $controllerName;

if (!class_exists($controllerClass)) {
    echo '404 - Class Not Found';
    exit;
}

$controller = new $controllerClass();

if (!method_exists($controller, $methodName)) {
    echo '404 - Method Not Found';
    exit;
}
call_user_func_array([$controller, $methodName], $params);
