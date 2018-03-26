<?php

namespace App;

use core\DBConnector;
use core\DBDriver;
use models\registration;
use core\Request;
use core\validation;
use core\Auth;

class Registr
{
    public $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getHash($password)
    {
        return hash('sha256', $password . 'sold');
    }

    public function addUser()
    {
        $addOne = new Registration(
            new DBDriver(DBConnector::getConnect()),
            new Validation(), 'users');
        $user = $addOne->add([
            'login' => $this->request->post('login'),
            'password' => $this->getHash($this->request->post('password')),
            'name' => $this->request->post('name'),
            'age' => $this->request->post('age'),
            'description' => $this->request->post('description'),
            'photo' => $this->request->post('image')
        ]);

        $_SESSION = session_id();
        if ($_SESSION == true && $user == true) {
            header('location:/userlist');
        }
    }

    public function deleteUser()
    {
        $delete = new Registration(new DBDriver(DBConnector::getConnect()),
            new Validation(), 'users');
        $delUser = $delete->delete(['id' => $this->request->post('id')]);
        $delPic = $this->request->post('pic');
        print_r($delPic);
        unlink("photos/$delPic");

        if ($delUser) {
            header('location:/userlist');
        }
    }

    public function signIn()
    {
        $login = new Registration(new DBDriver(DBConnector::getConnect()),
            new Validation(), 'users');
        $user = $login->getByLogin(['login' => $this->request->post('log')]);
        if (!$user) {
            echo "Не верный Логин!";
            return false;
        }
        $mathced = $this->getHash($this->request->post('pass')) === $user['password'];
        if (!$mathced) {
            echo " Не верные данные !";
        }
//      Авторизация
        $serviceAuth = new Auth();
        $serviceAuth->login($user['id']);
        header('location:/userlist');
    }
}