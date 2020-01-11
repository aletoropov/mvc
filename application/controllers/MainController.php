<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller
{

    public function indexAction()
    {
        $data['content'] = ' это MainController ';
        $this->view->render('indexAction', $data);
    }

    public function aboutAction()
    {
        echo 'это About action из контроллера Main';
    }

}