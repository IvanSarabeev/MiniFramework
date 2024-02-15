<?php

namespace app\controllers;

use app\core\Controller;

class MultyPlayerContr extends Controller
{
    public function computer()
    {
        $params = [];
        return $this->render('computer', $params);
    }

    public function handleComputerAction()
    {
        return 'Handle the Comp Action';
    }
}