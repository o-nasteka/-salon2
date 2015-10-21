<?php

class Currency {

    protected static $ex_rates;

    public static function set($value){
        self::$ex_rates = $value;
    }

    // Get by Alias from table products
    public static function getCurrency(){
        $sql = "select * from `currency` limit 1";
        return App::$db->query($sql);
    }

}
