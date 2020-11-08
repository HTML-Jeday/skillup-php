<?php

class Session
{   
    private static $self;
 
    public static function init()
    {
        return self::$self ?? self::$self = new Session();
    }
    
    
    private function __construct() {
        
        if (isset($_COOKIE['session_id'])) {
            session_id($_COOKIE['session_id']);
            session_start();
        } else {
            session_start();
            setcookie('session_id', session_id(), time() + 86400);
        }
        
    }
    
   
    
    public function get($key, $null = null)
    {
        return $_SESSION[$key] ?? $null;
    }
    
    public function set($key, $data)
    {
        
        $_SESSION[$key] = $data;
    }
    public function delete($key) {
        
         unset($_SESSION[$key]);
    }
}







