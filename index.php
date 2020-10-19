<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


class DB
{
    protected static $db;

    public function __construct(){}


    public static function getInstance(){
        if (!self::$db) {
            echo "ESTABLISH CONNECTION...<br>";
            self::$db = new mysqli(
                'db',
                'root',
                '',
                'skillup'
            );
        }

        echo "READ FROM EXISTING VARIABLE<br>";
        return self::$db;
    }
}

class User extends DB{

    private $name;
    private $password;

    public function __construct(){
        $this->getInstance();
    }
    public function createUser(string $name, int $psw){
        $this->name = $name;
        $this->password = $psw;
        self::$db->query("INSERT INTO users (email, password) VALUES('$name', $psw);");
    }
    public function deleteUser(){
        self::$db->query("DELETE FROM users WHERE `email` = '$this->name';");
    }
    public function updateUser($name, $psw){
        self::$db->query("UPDATE users SET `email` = '$name', `password` = $psw WHERE `email` = '$this->name';");
    }
    public function getUser(){
        $res = self::$db->query("SELECT * FROM users WHERE `email` = '$this->name';");
        return $res->fetch_all(MYSQLI_ASSOC);
    }
}

$newUser = new User();
$newUser->createUser('Vasya', 123);
?>