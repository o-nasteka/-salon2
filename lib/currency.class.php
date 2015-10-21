<?php

class Currency{

    protected static $ex_rates;

    public static function get(){
        return isset(self::$ex_rates) ? self::$ex_rates : null;
    }

    public static function set($value){
        self::$ex_rates = $value;
    }

}