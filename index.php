<?php
define('ROOT_DIR', dirname(__FILE__));
require_once ROOT_DIR.'/application/lib/Dev.php';
require_once ROOT_DIR.'/application/autoload.php';

use application\core\Router;

session_start();

try {
    $router = new Router();
    $router->run();
} catch (Exception $e) {
    echo $e->getMessage() . '<br>'; //выводим текст исключения.
    echo $e->getFile() . '<br>';
    echo $e->getCode();
}