<?php

class DB
{
    protected static $db;

    public function __construct(){}


    public static function getInstance(){
        if (!self::$db) {
            self::$db = new mysqli(
                'db',
                'root',
                '',
                'skillup'
            );
        }

        return self::$db;
    }
}

