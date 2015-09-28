<?php

class Message extends Model {

    public function getList(){
        $sql = "select * from `messages` where 1";
        return $this->db->query($sql);
    }

}