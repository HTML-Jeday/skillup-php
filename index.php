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

class Phone extends DB{
    function __construct(){

    }
    function call($to){
        $this->getInstance();
        $query = 'INSERT INTO calls (`from`, `to`) VALUE ('.$this->number.' ,'.$to->number.') ';
        self::$db->query($query);
    }
}

class User extends Phone{
    public $number;
    public $name;
    function __construct(string $name, int $number){
        $this->name = $name;
        $this->number = $number;
    }

}

$user1 = new User('Vasya', 123);
$user2 = new User('Petya', 321);
$user3 = new User('Member', 333);

$user1->call($user2);
$user2->call($user3);
?>

