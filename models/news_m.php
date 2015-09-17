<?php

class News_m extends Model {

    //Удаление отмеченных чекбоксов
    public function del_news_checkbox(){

        foreach($_POST['ids'] as $k=>$v) {
            $_POST['ids'][$k] = (int)$v;
        }

        $ids = implode(',',$_POST['ids']);
        $sql = "DELETE FROM `news` WHERE `id` IN (".$ids.") ";

       return $this->db->query($sql);
    }


    // Удаление по id
    public function del_news_id($id = array()){
       $id = (int)$id[0];

        $sql = " DELETE FROM `news` WHERE `id` = '{$id}' ";

        return $this->db->query($sql);

    }

    //Выборка всех новостей
    public function list_news(){
        $sql = "SELECT * FROM `news` ORDER BY `id` ASC";
        return $this->db->query($sql);
    }

    public function add_news(){

            foreach($_POST as $k=>$v) {
                $_POST[$k] = $this->db->escape(trim($v));
            }

            $sql = "
		INSERT INTO `news` SET
		`title`       = '".($_POST['title'])."',
		`text`        = '".($_POST['content_min'])."',
		`description` = '".($_POST['content'])."',
		`date`        = NOW()
	";

        return $this->db->query($sql);
    }















    public function save($data, $id = null){
        if ( !isset($data['name']) || !isset($data['email']) || !isset($data['message']) ){
            return false;
        }

        $id = (int)$id;
        $name = $this->db->escape($data['name']);
        $email = $this->db->escape($data['email']);
        $message = $this->db->escape($data['message']);

        if ( !$id ){ // Add new record
            $sql = "
                insert into `messages`
                   set name = '{$name}',
                       email = '{$email}',
                       message = '{$message}'
            ";
        } else { // Update existing record
            $sql = "
                update `messages`
                   set name = '{$name}',
                       email = '{$email}',
                       message = '{$message}'
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