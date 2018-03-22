<?php

namespace App;

class Auth extends MainController
{
    public function index()
    {

        //$regModel = new Authorization();

        $this->view->render('authUsers', []);


    }
}