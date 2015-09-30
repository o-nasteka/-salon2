<?php

class Send_m extends Model {

    public function sendEmail($data){

        $mail = new PHPMailer;

        $mail->CharSet = 'UTF-8';
        // $mail->setLanguage('ru');
        // $mail->SetLanguage("ru","phpmailer/language");
        $mail->setFrom('order@salon-ss.com.ua', 'Order');
        $mail->Subject = 'New Order!';

        $mail->addAddress('oleg.nasteka@gmail.com', 'Oleg Nasteka');     // Add a recipient
        // $mailer->AddBCC('recipient1@domain.com', '������ �������');  ��������� ���������� ��� BCC
        // $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo('info@salon-ss.com.ua', 'Information');

        $mail->isHTML(true);                                  // Set email format to HTML




        $mess = '
        <strong>Name: </strong>'.$data['name'].'<br />
        <strong>Phone: </strong>'.$data['phone'].'<br />
        <strong>Title: </strong>'.$data['title'];

        //
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

    public function getList($id_start = null){
        // Результирующий массив с элементами, выбранными с учётом LIMIT:
        $items    = array();

        // Число вообще всех элементов ( без LIMIT ) по нужным критериям.
        $allItems = 0;

        // HTML - код постраничной навигации.
        $html     = NULL;

        // Количество элементов на странице.
        // В системе оно может определяться например конфигурацией пользователя:
        $limit    = 10;
        $res['limit'] = $limit;
        // Количество страничек, нужное для отображения полученного числа элементов:
        $pageCount = 0;

        // Содержит наш $params[1] -параметр из строки запроса.
        // У первой страницы его не будет, и нужно будет вместо него подставить 0!!!
        $start    = isset($id_start)  ? (int)$id_start    : 0 ;
        $res['start'] = $start;


        // Запрос для выборки целевых элементов:
        $sql = 'SELECT           ' .
            ' * 				 ' .
            'FROM             ' .
            '  `messages`     ' .

            'LIMIT            ' .
            $start . ',   ' . $limit   . '

             ';


        $res['item']  = $this->db->query($sql);




        // СОБСТВЕННО, ПОСТРАН�?ЧНАЯ НАВ�?ГАЦ�?Я:
        // Получаем количество всех элементов:
        $sql = 'SELECT         ' .
            '  COUNT(*) AS `count` ' .
            'FROM           ' .
            '  `messages` '
        ;
        $stmt  = $this->db->query($sql);
        $allItems = $stmt[0]['count'];
        $res['count'] =$allItems;



        // Здесь округляем в большую сторону, потому что остаток
        // от деления - кол-во страниц тоже нужно будет показать
        // на ещё одной странице.
        $pageCount = ceil( $allItems / $limit);

        // Начинаем с нуля! Это даст нам правильные смещения для БД
        for( $i = 0; $i < $pageCount; $i++ ) {
            // Здесь ($i * $limit) - вычисляет нужное для каждой страницы  смещение,
            // а ($i + 1) - для того что бы нумерация страниц начиналась с 1, а не с 0
            @$res['html'] .= '<li><a href="/admin/send/index/start/' . ($i * $limit)  . '">' . ($i + 1)  . '</a></li>';
            // $html .= '<li><a href="index.php?start=' . ($i * $limit)  . '">' . ($i + 1)  . '</a></li>';
        }

       // echo '<pre>';
       // print_r($res);
       // exit;

        return $res;

       // $sql = "select * from `messages` where 1";
       // return $this->db->query($sql);
    }

    // Get all by Id from table messages
    public function getById($id){
        $id = (int)$id;
        $sql = "select * from `messages` where `id` = '{$id}' limit 1";
        $result = $this->db->query($sql);
        return isset($result[0]) ? $result[0] : null;
    }


    // Save to table messages - ������
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