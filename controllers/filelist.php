<?php

namespace App;

use core\DBConnector;
use core\DBDriver;
use models\registration;
use core\validation;
use core\Auth;

class FileList extends MainController
{
    public function index()
    {
        $auth = new Auth();
        if (!$auth->isAuth()) {
            header('location:/');
        }

        $image = new  Registration(new DBDriver(DBConnector::getConnect()), new
        Validation(), 'users');
        $pictures = $image->selectImages();
        $this->view->render('filelist', $pictures);
    }
}