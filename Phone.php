<?php

require_once 'DB.php';

class Phone extends DB {
    function __construct(){

    }
    function call(int $from, int $to){
        $this->getInstance();
        $query = 'INSERT INTO calls (`from`, `to`) VALUE ('.$from.' ,'.$to.') ';
        self::$db->query($query);
    }
}