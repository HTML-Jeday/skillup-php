<?php

require_once 'User.php';
require_once 'Phone.php';


$user1 = new User('Vasya', 123);
$user2 = new User('Petya', 321);
$user3 = new User('Member', 333);

$phone = new Phone();
$phone->call($user2->number, $user3->number);


?>

