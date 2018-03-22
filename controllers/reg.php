<?php

namespace App;


class Reg extends MainController
{
    public function index()
    {
        $this->view->render('regUsers', []);
    }
}