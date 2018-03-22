<?php

namespace App;

class Courses extends MainController
{
    public function php()
    {
        echo 'PHP IS HERE';
    }

    public function index()
    {
        $userModel = new User();
        $users = $userModel->all();
        $data = [
            'users' => $users
        ];
        $data['moredata'] = 'moredata';

        $this->view->render('courseUsers', $data);
    }
}
