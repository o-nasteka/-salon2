<?php
/**
 * Top Menu
 * User: nasteka
 * Date: 09.10.15
 * Time: 17:32
 */

class NavBar {


    public static function TopMenu(){

        // Get Menu
        $data['menu'] = self::getMenu();

        // echo "<pre>";
        // print_r($menu);
        // exit;

        $template_name = VIEWS_PATH.DS."navbar.html";
        return require_once("$template_name");


    }

    // getMenu
    private static function getMenu(){
        $sql = "select * from `products` ";
        // return App::db->query($sql);

        return App::$db->query($sql);
    }

}




?>