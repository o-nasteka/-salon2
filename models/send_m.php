<?php

class Send_m extends Model {

    public function sendEmail(){

        $mail = new PHPMailer;

        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        // $mail->isSMTP();                                      // Set mailer to use SMTP
        // $mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
        // $mail->SMTPAuth = true;                               // Enable SMTP authentication
        // $mail->Username = 'user@example.com';                 // SMTP username
        // $mail->Password = 'secret';                           // SMTP password
        // $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        // $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom('order@salon-ss.com.ua', 'Order');
        $mail->addAddress('oleg.nasteka@gmail.com', 'Oleg Nasteka');     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Новый заказ';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

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