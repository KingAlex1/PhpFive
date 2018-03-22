<?php

namespace App;

class UserList extends MainController
{
    public function index()
    {
        $this->view->render('list', []);
    }
}
