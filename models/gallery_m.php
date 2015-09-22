<?php
class gallery_m extends Model{


    public function list_gallery()
    {

        $sql = "SELECT * FROM `gallery`";


        return $this->db->query($sql);
    }
}