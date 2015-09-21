<?php

class Session{

    protected static $flash_message;

    public static function setFlash($message){
        self::$flash_message = $message;
    }

    public static function hasFlash(){
        return !is_null(self::$flash_message);
    }

    public static function flash(){
        echo self::$flash_message;
        self::$flash_message = null;
    }

    public static function flash_redir(){
       // unset($_SESSION['i']);
        if(isset($_POST)){
            if (!isset($_SESSION['i'])) {
                $_SESSION['i'] = 0;
            }
            //unset($_SESSION['i']);
            $_SESSION['i']++;
            echo $_SESSION['i'];
            if ($_SESSION['i'] == 2) {
                echo self::$flash_message;
                self::$flash_message = null;
                unset($_SESSION['i']);
            }
        }
    }

    public static function set($key, $value){
        $_SESSION[$key] = $value;
    }

    public static function get($key){
        if ( isset($_SESSION[$key]) ){
            return $_SESSION[$key];
        }
        return null;
    }

    public static function delete($key){
        if ( isset($_SESSION[$key]) ){
            unset($_SESSION[$key]);
        }
    }

    public static function destroy(){
        session_destroy();
    }

}