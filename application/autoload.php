<?php
spl_autoload_register(function($class) {
    $path = str_replace('\\', '/', trim($class) . '.php');
    if (file_exists($path)) {
        require_once $path;
    } else {
        throw new Exception('Нет такоого класса: ' . $path);
    }
});