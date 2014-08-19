<?php namespace AskGodComAu\Core;


class SessionHelper {

    public static function Start() {
        session_start();
    }

    public static function is_set($name) {
        return isset($_SESSION[$name]);
    }

    public static function get($name) {
        return $_SESSION[$name];
    }

    public static function set($name, $value) {
        $_SESSION[$name] = $value;
    }

    public static function remove($name) {
        unset($_SESSION[$name]);
    }

} 