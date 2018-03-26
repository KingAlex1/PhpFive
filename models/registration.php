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
        return $this->db->insert($this->table, $clear);
    }

    public function select()
    {
        return $this->db->select("SELECT * FROM {$this->table}");
    }

    public function selectImages()
    {
        return $this->db->select("SELECT id , photo FROM {$this->table }");
    }

    public function delete($key)
    {
        return $this->db->delete($this->table, "id = :key",
            ['key' => $key['id']]);
    }

    public function getHash($password)
    {
        return md5($password . 'JJJfdkkgfj0058__547383');
    }

    public function getByLogin(array $params)
    {
        $sql = "SELECT * FROM {$this->table} WHERE login = :login";
        return $this->db->select($sql,$params , DBDriver::FETCH_ONE);
    }


}