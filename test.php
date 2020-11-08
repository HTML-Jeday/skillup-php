<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

require_once "vendor/autoload.php";
require_once "Helpers/Session.php";


Session::init();



spl_autoload_register(function ($class) {

    $folder = "Helpers";
    if (strpos($class, "Model") !== false) {
        $folder = "Models";
    } else if (strpos($class, "Controller") !== false) {
        $folder = "Controllers";
    }

    $filePath = "$folder/$class.php";
    if (!file_exists($filePath)) {
        
        die('404 not found!!!!!');
    }

    require_once $filePath;
});


$requestURI = ltrim($_SERVER['REQUEST_URI'], '/'); // /orders/update/12

$parts = explode('/', $requestURI);

$class = empty($parts[0]) ? 'user' : $parts[0];
$method = $parts[1] ?? 'index';
$parameter = $parts[2] ?? null;

$controller = ucfirst($class) . 'Controller'; //main => Main || user => User

$object = new $controller();
if (method_exists($object, $method)) {
    $object->$method();
} else {
    //header("Location: /" . $class);
    die("NOT FOUND");
}