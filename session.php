<?php

if (isset($_COOKIE['session_id'])) {
    session_id($_COOKIE['session_id']);
    session_start();
} else {
    session_start();
    setcookie('session_id', session_id(), time() + 60*60);
}