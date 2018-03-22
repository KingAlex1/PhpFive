<?php

namespace models;

use core\DBDriver;
use core\Validation;



class Registration
{
    protected $db;
    protected $table;
    protected $validat;

    public function __construct(DBDriver $db, $table)
    {
        $this->db = $db;
        $this->table = $table;
        $this->validat = $validate;
    }


    public function add(array $params)
    {



       return $this->db->insert($this->table, $params);
    }
}