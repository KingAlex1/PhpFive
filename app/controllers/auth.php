<?php

namespace App;

class Auth extends MainController
{
    public function index()
    {
        echo "auth";
        // $regModel = new Authorization();

        $this->view->render('authUsers', []);


    }
}