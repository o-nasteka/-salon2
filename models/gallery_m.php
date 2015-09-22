<?php
class gallery_m extends Model{

    // Get all from table products
    public function getList()
    {
        // $sql = "SELECT * FROM `categories`";
        $sql = "SELECT * FROM `products`";

        // $id = (int)$id;
        return $this->db->query($sql);
    }
}