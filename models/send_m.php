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
        // $mailer->AddBCC('recipient1@domain.com', 'пїЅпїЅпїЅпїЅпїЅпїЅ пїЅпїЅпїЅпїЅпїЅпїЅпїЅ');  пїЅпїЅпїЅпїЅпїЅпїЅпїЅпїЅпїЅ пїЅпїЅпїЅпїЅпїЅпїЅпїЅпїЅпїЅпїЅ пїЅпїЅпїЅ BCC
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
        // Р РµР·СѓР»СЊС‚РёСЂСѓСЋС‰РёР№ РјР°СЃСЃРёРІ СЃ СЌР»РµРјРµРЅС‚Р°РјРё, РІС‹Р±СЂР°РЅРЅС‹РјРё СЃ СѓС‡С‘С‚РѕРј LIMIT:
        $items    = array();

        // Р§РёСЃР»Рѕ РІРѕРѕР±С‰Рµ РІСЃРµС… СЌР»РµРјРµРЅС‚РѕРІ ( Р±РµР· LIMIT ) РїРѕ РЅСѓР¶РЅС‹Рј РєСЂРёС‚РµСЂРёСЏРј.
        $allItems = 0;

        // HTML - РєРѕРґ РїРѕСЃС‚СЂР°РЅРёС‡РЅРѕР№ РЅР°РІРёРіР°С†РёРё.
        $html     = NULL;

        // РљРѕР»РёС‡РµСЃС‚РІРѕ СЌР»РµРјРµРЅС‚РѕРІ РЅР° СЃС‚СЂР°РЅРёС†Рµ.
        // Р’ СЃРёСЃС‚РµРјРµ РѕРЅРѕ РјРѕР¶РµС‚ РѕРїСЂРµРґРµР»СЏС‚СЊСЃСЏ РЅР°РїСЂРёРјРµСЂ РєРѕРЅС„РёРіСѓСЂР°С†РёРµР№ РїРѕР»СЊР·РѕРІР°С‚РµР»СЏ:
        $limit    = 10
        ;
        $res['limit'] = $limit;
        // РљРѕР»РёС‡РµСЃС‚РІРѕ СЃС‚СЂР°РЅРёС‡РµРє, РЅСѓР¶РЅРѕРµ РґР»СЏ РѕС‚РѕР±СЂР°Р¶РµРЅРёСЏ РїРѕР»СѓС‡РµРЅРЅРѕРіРѕ С‡РёСЃР»Р° СЌР»РµРјРµРЅС‚РѕРІ:
        $pageCount = 0;

        // РЎРѕРґРµСЂР¶РёС‚ РЅР°С€ $params[1] -РїР°СЂР°РјРµС‚СЂ РёР· СЃС‚СЂРѕРєРё Р·Р°РїСЂРѕСЃР°.
        // РЈ РїРµСЂРІРѕР№ СЃС‚СЂР°РЅРёС†С‹ РµРіРѕ РЅРµ Р±СѓРґРµС‚, Рё РЅСѓР¶РЅРѕ Р±СѓРґРµС‚ РІРјРµСЃС‚Рѕ РЅРµРіРѕ РїРѕРґСЃС‚Р°РІРёС‚СЊ 0!!!
        $start    = isset($id_start)  ? (int)$id_start    : 0 ;
        $res['start'] = $start;


        // Р—Р°РїСЂРѕСЃ РґР»СЏ РІС‹Р±РѕСЂРєРё С†РµР»РµРІС‹С… СЌР»РµРјРµРЅС‚РѕРІ:
        $sql = 'SELECT           ' .
            ' * 				 ' .
            'FROM             ' .
            '  `messages`     ' .

            'LIMIT            ' .
            $start . ',   ' . $limit   . '

             ';


        $res['item']  = $this->db->query($sql);




        // РЎРћР‘РЎРўР’Р•РќРќРћ, РџРћРЎРўР РђРќР?Р§РќРђРЇ РќРђР’Р?Р“РђР¦Р?РЇ:
        // РџРѕР»СѓС‡Р°РµРј РєРѕР»РёС‡РµСЃС‚РІРѕ РІСЃРµС… СЌР»РµРјРµРЅС‚РѕРІ:
        $sql = 'SELECT         ' .
            '  COUNT(*) AS `count` ' .
            'FROM           ' .
            '  `messages` '
        ;
        $stmt  = $this->db->query($sql);
        $allItems = $stmt[0]['count'];
        $res['count'] =$allItems;



        // Р—РґРµСЃСЊ РѕРєСЂСѓРіР»СЏРµРј РІ Р±РѕР»СЊС€СѓСЋ СЃС‚РѕСЂРѕРЅСѓ, РїРѕС‚РѕРјСѓ С‡С‚Рѕ РѕСЃС‚Р°С‚РѕРє
        // РѕС‚ РґРµР»РµРЅРёСЏ - РєРѕР»-РІРѕ СЃС‚СЂР°РЅРёС† С‚РѕР¶Рµ РЅСѓР¶РЅРѕ Р±СѓРґРµС‚ РїРѕРєР°Р·Р°С‚СЊ
        // РЅР° РµС‰С‘ РѕРґРЅРѕР№ СЃС‚СЂР°РЅРёС†Рµ.
        $pageCount = ceil( $allItems / $limit);

        // РќР°С‡РёРЅР°РµРј СЃ РЅСѓР»СЏ! Р­С‚Рѕ РґР°СЃС‚ РЅР°Рј РїСЂР°РІРёР»СЊРЅС‹Рµ СЃРјРµС‰РµРЅРёСЏ РґР»СЏ Р‘Р”
        for( $i = 0; $i < $pageCount; $i++ ) {
            // Р—РґРµСЃСЊ ($i * $limit) - РІС‹С‡РёСЃР»СЏРµС‚ РЅСѓР¶РЅРѕРµ РґР»СЏ РєР°Р¶РґРѕР№ СЃС‚СЂР°РЅРёС†С‹  СЃРјРµС‰РµРЅРёРµ,
            // Р° ($i + 1) - РґР»СЏ С‚РѕРіРѕ С‡С‚Рѕ Р±С‹ РЅСѓРјРµСЂР°С†РёСЏ СЃС‚СЂР°РЅРёС† РЅР°С‡РёРЅР°Р»Р°СЃСЊ СЃ 1, Р° РЅРµ СЃ 0
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


    // Save to table messages - пїЅпїЅпїЅпїЅпїЅпїЅ
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
