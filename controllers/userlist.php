<?php

namespace App;

use core\DBConnector;
use core\DBDriver;
use models\registration;
use core\validation;
use core\Auth;

class UserList extends MainController
{
    public function index()
    {
        $auth = new Auth();
        if (!$auth->isAuth()) {
            header('location:/');
        }
        $out = new Registration(new DBDriver(DBConnector::getConnect()), new Validation(), 'users');
        $users = $out->select();
        $this->view->render('list', $users);
    }
}