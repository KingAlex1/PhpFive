<?php

namespace App;

use core\request;
use core\DBConnector;
use core\DBDriver;
use models\registration;

class Output
{

    public function output()
    {
        $out = new Registration(new DBDriver(DBConnector::getConnect()), new Validation(), 'users');
        $out->select();
        echo "<pre>";


    }

}