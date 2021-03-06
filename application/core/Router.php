<?php

namespace application\core;

class Router
{
    public $routes = [];
    public $params = [];

    /**
     * Router constructor.
     * Подключаем файл роутинга.
     */
    public function __construct()
    {
        $arr = require_once ROOT_DIR . DIRECTORY_SEPARATOR . 'application' . DIRECTORY_SEPARATOR . 'config ' .DIRECTORY_SEPARATOR. 'routes.php';
        foreach ($arr as $key => $value) {
            $this->add($key, $value);
        }
    }

    /**
     * Добавление маршрутов.
     *
     * @param $route
     * @param $params
     */
    public function add($route, $params)
    {
        $route = '#^' . $route . '$#';
        $this->routes[$route] = $params;
    }

    public function match()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    /**
     * Запуск приложения.
     *
     * @throws \Exception
     */
    public function run()
    {
        if ($this->match()) {
            $path = 'application'.DIRECTORY_SEPARATOR.'controllers' . DIRECTORY_SEPARATOR . ucfirst($this->params['controller']) . 'Controller';

            if (class_exists($path)) {
                $action = $this->params['action'].'Action';
                if (method_exists($path, $action)) {
                    $controller = new $path($this->params['controller']);
                    $controller->$action();
                } else {
                    throw \Exception('Action: ' . htmlspecialchars($action) . ' - не найден!');
                }
            } else {
                throw new \Exception('Контроллер не найден: ' . htmlspecialchars($path));
            }
        } else {
            throw new \Exception('Маршрут не найден!');
        }
    }
}