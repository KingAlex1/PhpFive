<?php

namespace core;

class DBConnector
{
    private static $instance;

    public static function getConnect()
    {
        if (self::$instance === null) {
            self::$instance = self::getPDO();
        }
        return self::$instance;
    }

    private static function getPDO()
    {
        $dsn = sprintf('%s:host=%s;dbname=%s', 'mysql', Config::HOST,
            Config::BDNAME);
        return new \PDO($dsn, Config::LOGIN, Config::PASS);
    }
}