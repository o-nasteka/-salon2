<?php
class Cat_m extends Model{

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


    // Delete from table categories
    public function delete($id){
        $id = (int)$id;
        $sql = "delete from `categories` where `id` = {$id}";
        return $this->db->query($sql);
    }



}

?>