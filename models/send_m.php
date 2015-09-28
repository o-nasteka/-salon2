<?php

class Send_m extends Model {

    public function sendEmail(){

        $mail = new PHPMailer();
        $mail->From = 'order@salon-ss.com.ua';      // от кого
        $mail->FromName = 'salon-ss';   // от кого Имя
        $mail->AddAddress('oleg.nasteka@gmail.com', 'Олег'); // кому Ваша почта, Имя
        $mail->IsHTML(true);        // формат письма HTML
        $mail->Subject = "Новый заказ!";  // тема письма

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }


    }

    //  Send message
    public function SendMsg($data, $id = null){
        if ( !isset($data['name']) || !isset($data['phone']) || !isset($data['title'])){
            return false;
        }

        $id = (int)$id;
        $name = $this->db->escape($data['name']);
        $phone = $this->db->escape($data['phone']);
        $title = $this->db->escape($data['title']);

        if ( !$id ){ // Add new record
            $sql = "
                insert into `messages`
                   set name = '{$name}',
                       phone = '{$phone}',
                       title = '{$title}'
            ";
        } else { // Update existing record
            $sql = "
                update `messages`
                   set name = '{$name}',
                       phone = '{$phone}',
                       title = '{$title}'
                   where id = {$id}
            ";
        }

        return $this->db->query($sql);

    }

    public function getList(){
        $sql = "select * from `messages` where 1";
        return $this->db->query($sql);
    }

    // Get all by Id from table messages
    public function getById($id){
        $id = (int)$id;
        $sql = "select * from `messages` where `id` = '{$id}' limit 1";
        $result = $this->db->query($sql);
        return isset($result[0]) ? $result[0] : null;
    }


    // Save to table messages - Заявки
    public function save($data, $id = null){
        if ( !isset($data['name']) || !isset($data['phone']) || !isset($data['title']) || !isset($data['status'])){
            return false;
        }

        // delete 'space';
        $data = $this->db->trimAll_l($data);

        $id = (int)$id;
        $name = $this->db->escape($data['name']);
        $phone = $this->db->escape($data['phone']);
        $title = $this->db->escape($data['title']);
        $status = $this->db->escape($data['status']);



        if ( !$id ){ // Add new record
            $sql = "
                insert into `messages`
                   set name = '{$name}',
                       phone = '{$phone}',
                       title = '{$title}',
                       status = '{$status}'

            ";


        } else { // Update existing record
            $sql = "
                update `messages`
                   set name = '{$name}',
                       phone = '{$phone}',
                       title = '{$title}',
                       status = '{$status}'

                   where `id` = {$id}
            ";
        }

        return $this->db->query($sql);
    }


    // Delete from table messages
    public function delete($id){
        $id = (int)$id;
        $sql = "delete from `messages` where `id` = {$id}";
        return $this->db->query($sql);
    }

}