<?php


class User {
    public $name;
    public $number;
    function __construct(string $name, int $number){
        $this->name = $name;
        $this->number = $number;
    }
}
