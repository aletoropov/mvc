<?php


namespace application\core;


class View
{
    public $layout = 'default';
    public $route;
    public $path;

    public function __construct($route)
    {
        $this->route = $route;
        //TODO: разобраться почему не массив.
        //$this->path = $route['controller'] . DIRECTORY_SEPARATOR . $route['action'];
        echo $this->route;
        //TODO: проверка наличия файлов шаблона.
    }

    public function render($title, $data = [])
    {
        ob_start();
        extract($data);
        //TODO: разобраться с подключением шаблонов контроллеров.
        //require_once 'application' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $this->path . '.php';
        //$content = ob_get_clean();

        require_once 'application' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . $this->layout . '.php';
        $page = ob_get_clean();
        print $page;
    }

}