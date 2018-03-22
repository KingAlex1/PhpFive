<?php

namespace App;

class Reg extends MainController
{
    public function index()
    {
        echo 'reg';
        $this->view->render('regUsers', []);
    }
}