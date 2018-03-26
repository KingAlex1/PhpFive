<?php

namespace App;

class Auth extends MainController
{
    public function index()
    {
        $this->view->render('authUsers', []);
    }
}