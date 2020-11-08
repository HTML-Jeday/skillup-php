<?php

class DB
{
    private static $db;

    private function __construct() {}

    public static function getInstance(): mysqli
    {
        return self::$db ?? self::$db = new mysqli("db", 'root', '', 'skillup');
    }
}