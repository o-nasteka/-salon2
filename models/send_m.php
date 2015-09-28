<?php

class Send_m extends Model {

    //  Send message
    public function SendMsg($data, $id = null){
        if ( !isset($data['name']) || !isset($data['phone']) ){
            return false;
        }

        $id = (int)$id;
        $name = $this->db->escape($data['name']);
        $phone = $this->db->escape($data['phone']);

        if ( !$id ){ // Add new record
            $sql = "
                insert into `messages`
                   set name = '{$name}',
                       phone = '{$phone}'
            ";
        } else { // Update existing record
            $sql = "
                update `messages`
                   set name = '{$name}',
                       phone = '{$phone}'
                   where id = {$id}
            ";
        }



        return $this->db->query($sql);

    }

    public function getList(){
        $sql = "select * from `messages` where 1";
        return $this->db->query($sql);
    }

}