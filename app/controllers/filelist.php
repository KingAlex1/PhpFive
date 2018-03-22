<?php

namespace App;

class FileList extends MainController
{
    public function index()
    {
        $this->view->render('filelist', []);
    }
}