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
}

?>