<?php

class Send_m extends Model {

    public function sendEmail($data){

        $mail = new PHPMailer;

        $mail->CharSet = 'UTF-8';
        $mail->setFrom('order@salon-ss.com.ua', 'Order');
        $mail->addAddress('oleg.nasteka@gmail.com', 'Oleg Nasteka');     // Add a recipient
        // $mailer->AddBCC('recipient1@domain.com', 'Первый человек');  Невидимые получатели или BCC
        // $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo('info@salon-ss.com.ua', 'Information');

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'New Order!';


        $mess = '
        <strong>Name: </strong>'.$data['name'].'<br />
        <strong>Phone: </strong>'.$data['phone'].'<br />
        <strong>Title: </strong>'.$data['title'];


        /*
        $mess =
'
        <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>New order</title>
  <title>New order</title>
</head>
<body>
<div style="width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 11px;">
  <h3>New order from www.salon-ss.com.ua</h3><br>
  <div align="left">
     <p >Name: '.$data['name'].'</p>
     <p>Phone: '.$data['phone'].'</p>
  </div>



</div>
</body>
</html>
        ';
*/



        $mail->Body=$mess;

        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo '';
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
        $date = date("Y-m-d H:i:s");

        if ( !$id ){ // Add new record
            $sql = "
                insert into `messages`
                   set name = '{$name}',
                       phone = '{$phone}',
                       title = '{$title}',
                       date = '{$date}'
            ";
        } else { // Update existing record
            $sql = "
                update `messages`
                   set name = '{$name}',
                       phone = '{$phone}',
                       title = '{$title}'

                   where id = {$id}
                   //
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
        $date = date("d.m.y");



        if ( !$id ){ // Add new record
            $sql = "
                insert into `messages`
                   set name = '{$name}',
                       phone = '{$phone}',
                       title = '{$title}',
                       status = '{$status}',
                       date = '{$date}'

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