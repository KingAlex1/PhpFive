<?php

namespace App;

class reg extends MainController
{
    public function index()
    {
        $this->view->render('regUsers', []);
    }
}