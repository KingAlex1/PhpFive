<?php

require_once "app/core/config.php";
require_once "app/core/MainController.php";
require_once "app/core/View.php";
require_once "app/models/user.php";


$routes = explode('/', $_SERVER['REQUEST_URI']);


$controllerName = "auth";
$actionName = "index";

if (!empty($routes[1])) {
    $controllerName = $routes[1];
}

if (!empty($routes[2])) {
    $actionName = $routes[2];
}

$fileName = "app/controllers/" . strtolower($controllerName) . ".php";

try {
    if (file_exists($fileName)) {
        require_once $fileName;
    } else {
        throw new Exception("File not found");
    }

    $className = "\App\\" . ucfirst($controllerName);

    if (class_exists($className)) {
        $controller = new $className;
    } else {
        throw  new Exception(" File Found but class not found");
    }

    if (method_exists($controller, $actionName)) {
        $controller->$actionName();
    }else {
        throw new Exception("Method not found");
    }
} catch (Exception $e) {
    require "app/core/errors/404.php";
}