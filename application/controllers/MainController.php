<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller
{

    public function indexAction()
    {
        echo ' это MainController ';
    }

    public function aboutAction()
    {
        echo 'это About action из контроллера Main';
    }

}