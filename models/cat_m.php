<?php
class Cat_m extends Model{

    // Get all by Id from table categories
    public function getById($id){
        $id = (int)$id;
        $sql = "select * from `categories` where `id` = '{$id}' limit 1";
        $result = $this->db->query($sql);
        return isset($result[0]) ? $result[0] : null;
    }

    // Get all from table categories
    public function getList()
    {
        // $sql = "SELECT * FROM `categories`";
        $sql = "SELECT * FROM `categories`";

        // $id = (int)$id;
        return $this->db->query($sql);
    }

    public function getList_jaluzi(){
        // $sql = "SELECT * FROM `categories`";
        $sql = "SELECT * FROM `categories` WHERE `id` IN (2,6,10) ";

        // $id = (int)$id;
        return $this->db->query($sql);
    }

    public function getList_roleti(){
        // $sql = "SELECT * FROM `categories`";
        $sql = "SELECT * FROM `categories` WHERE `id` IN (14,21,26,32,31) ";

        // $id = (int)$id;
        return $this->db->query($sql);
    }

    public function getList_plisse(){
        // $sql = "SELECT * FROM `categories`";
        $sql = "SELECT * FROM `categories` WHERE `id` = 33 ";

        // $id = (int)$id;
        return $this->db->query($sql);
    }

    public function getList_antimos(){
        // $sql = "SELECT * FROM `categories`";
        $sql = "SELECT * FROM `categories` WHERE `id` = 38 ";

        // $id = (int)$id;
        return $this->db->query($sql);
    }

    public function getList_out_sys(){
        // $sql = "SELECT * FROM `categories`";
        $sql = "SELECT * FROM `categories` WHERE `id` = 49 OR `id` = 50
        OR `id` = 51 OR `id` = 52 OR `id` = 53 OR `id` = 54   ";

        // $id = (int)$id;
        return $this->db->query($sql);
    }

    // Save to table categories - Категория товара
    public function save($data, $id = null){
        if ( !isset($data['title']) || !isset($data['price_from'])  ){
            return false;
        }

        // delete 'space';
        $data = $this->db->trimAll_l($data);

        $id = (int)$id;
        $title = $this->db->escape($data['title']);
        $price_from = $this->db->escape($data['price_from']);
        // $parent_id = $this->db->escape($data['parent_id']);
        $img_child = $this->db->escape($data['img_child']);
        $img_parent = $this->db->escape($data['img_parent']);

        if ( !$id ){ // Add new record
            $sql = "
                insert into `categories`
                   set title = '{$title}',
                       price_from = '{$price_from}',
                       img_child = '{$img_child}',
                       img_parent = '{$img_parent}'
            ";


        } else { // Update existing record
            $sql = "
                update `categories`
                   set title = '{$title}',
                       price_from = '{$price_from}',
                       img_parent = '{$img_parent}'

                   where `id` = {$id}
            ";
        }

        return $this->db->query($sql);
    }

    // Delete from table categories
    public function delete($id){
        $id = (int)$id;
        $sql = "delete from `categories` where `id` = {$id}";
        return $this->db->query($sql);
    }



}

?>