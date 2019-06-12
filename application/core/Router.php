<?php

namespace application\core;

class Router
{
    protected $routes = [];
    protected $params = [];

    /**
     * Router constructor.
     * Подключаем файл роутинга.
     */
    function __construct()
    {
        $arr = require_once ROOT_DIR.'/application/config/routes.php';
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

    public function run()
    {
        if ($this->match()) {
            $path = 'application\controllers\\' . ucfirst($this->params['controller']) . 'Controller';
            if (class_exists($path)) {
                $action = $this->params['action'].'Action';
                if (method_exists($path, $action)) {
                    $controller = new $path;
                    $controller->$action();
                } else {
                    throw \Exception('Action: ' . $action . ' - не найден!');
                }
            } else {
                throw new \Exception('Контроллер не найден: ' . $path);
            }
        } else {
            throw new \Exception('Маршрут не найден!');
        }
    }
}