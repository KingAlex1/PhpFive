<?php

namespace App;

use core\request;
use core\DBConnector;
use core\DBDriver;
use models\registration;
use core\validation;


class UserList extends MainController
{
    public function index()
    {

        $out = new Registration(new DBDriver(DBConnector::getConnect()), new Validation(), 'users');
        $users = $out->select();

        $this->view->render('list', $users);
    }
}
