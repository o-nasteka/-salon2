<?php

class NavBar {


    public static function TopMenu(){

        // Get Menu
        $data['menu'] = self::getMenu();

        $template_name = VIEWS_PATH.DS."navbar.php";
        return require_once("$template_name");

    }

    // getMenu
    private static function getMenu(){
        $sql = "select * from `products` ";

        return App::$db->query($sql);
    }

}


?>