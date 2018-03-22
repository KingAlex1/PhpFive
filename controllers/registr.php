<?php


namespace App;

use core\DBConnector;
use core\DBDriver;
use models\registration;
use core\Request;
use core\Validation;


class Registr {

    public $request;


    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function addUser()
    {

        $mPost = new Registration(new DBDriver(DBConnector::getConnect()), 'users');
        $mPost->add([
            'login' => $this->request->post('login'),
            'password' => $this->request->post('password'),
            'name' => $this->request->post('name'),
            'age' => $this->request->post('age'),
            'description' => $this->request->post('description'),
            'photo' => $this->request->post('image')
        ]);
    }
}