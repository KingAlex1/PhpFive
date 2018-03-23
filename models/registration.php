<?php

namespace models;

use core\DBDriver;
use core\Validation;


class Registration
{

    protected $db;
    protected $table;
    protected $validation;


    public function __construct(DBDriver $db, Validation $validation, $table)
    {
        $this->db = $db;
        $this->table = $table;
        $this->validation = $validation;
    }


    public function add(array $params)
        {
        $clear = $this->validation->checkData($params);
        print_r($clear);
        return $this->db->insert($this->table, $clear);
    }

    public function select () {
        return $this->db->select("SELECT * FROM {$this->table}");

    }
}