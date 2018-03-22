<?php

require_once "controllers/registr.php";
require_once "core/MainController.php";
require_once "core/View.php";

use App\Registr;
use core\request;
function __autoload($classname)
{
    include_once __DIR__ . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $classname) . '.php';
}

session_start();

$routes = explode('/', $_SERVER['REQUEST_URI']);

if ($_POST) {
   // var_dump($_POST);
    $request = new Request($_GET, $_POST, $_SERVER, $_COOKIE, $_FILES, $_SESSION);
    $controller = new Registr($request);
    $controller->addUser();

 //   header("Location: /");
}

$controllerName = "auth";
$actionName = "index";

if (!empty($routes[1])) {
    $controllerName = $routes[1];
}

if (!empty($routes[2])) {
    $actionName = $routes[2];
}
//print_r($_POST);

$fileName = "controllers/" . strtolower($controllerName) . ".php";

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
    } else {
        throw new Exception("Method not found");
    }
} catch (Exception $e) {
    require "core/errors/404.php";
}






