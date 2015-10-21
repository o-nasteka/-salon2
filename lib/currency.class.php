<?php

class Currency {

    protected static $ex_rates;

    public static function setCurrency($rate){

        $ex_rates = $rate;
        $sql = "
                update `currency`
                   set rate = '{$ex_rates}'
                   where `id` = '1'
            ";

        App::$db->query($sql);
    }

    // Save
    public function save($data, $id = null){
        if ( !isset($data['alias']) || !isset($data['title']) || !isset($data['content']) ){
            return false;
        }

        $id = (int)$id;
        $alias = $this->db->escape($data['alias']);
        $title = $this->db->escape($data['title']);
        $content = $this->db->escape($data['content']);
        // $content = $data['content'];
        $is_published = isset($data['is_published']) ? 1 : 0;

        if ( !$id ){ // Add new record
            $sql = "
                insert into `pages`
                   set alias = '{$alias}',
                       title = '{$title}',
                       content = '{$content}',
                       is_published = {$is_published}
            ";
        } else { // Update existing record
            $sql = "
                update `pages`
                   set alias = '{$alias}',
                       title = '{$title}',
                       content = '{$content}',
                       is_published = {$is_published}
                   where `id` = {$id}
            ";
        }

        return $this->db->query($sql);
    }


    // Get by Alias from table products
    public static function getCurrency(){
        $sql = "select * from `currency` limit 1";
        return App::$db->query($sql);
    }

}
