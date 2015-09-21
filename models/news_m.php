<?php

class News_m extends Model {


public function view_id($id){
    $id = (int)$id;
    $sql = " SELECT * FROM `news` WHERE `id` = '{$id}' LIMIT 1 ";

    return $this->db->query($sql);

}




    // Удаление по id
    public function del_news_id($id){
       $id = (int)$id;

        $sql = " DELETE FROM `news` WHERE `id` = '{$id}' ";

        return $this->db->query($sql);

    }

    //Выборка всех новостей
    public function list_news(){
        $sql = "SELECT * FROM `news` ORDER BY `id` ASC";
        return $this->db->query($sql);
    }

    // Выборка одной новости по id
    public function list_news_id($id){
        $id = (int)$id;

        $sql = "SELECT * FROM `news` WHERE `id` = '{$id}' ";
        return $this->db->query($sql);
    }

    // Добавление новости
    public function add_news(){
        // Удаляет пробелы справа и слева, и применяет mysqli_escape_string
        foreach($_POST as $k=>$v) {
            $_POST[$k] = $this->db->escape(trim($v));
        }


            $sql = "
		INSERT INTO `news` SET
		`title`       = '".($_POST['title'])."',
		`content_min` = '".($_POST['content_min'])."',
		`content`     = '".($_POST['content'])."',
		`date`        = NOW()
	";

        return $this->db->query($sql);
    }


    // Редактирование новости
    public function edit_news($id){

        $id = (int)$id;

        // Удаляет пробелы справа и слева, и применяет mysqli_escape_string к массиву POST
        foreach($_POST as $k=>$v) {
            $_POST[$k] = $this->db->escape(trim($v));
        }

        $sql = "
		UPDATE `news` SET
		`title`       = '".($_POST['title'])."',
		`content_min` = '".($_POST['content_min'])."',
		`content`     = '".($_POST['content'])."',
		`date`        = NOW()

		WHERE `id` = ".$id."
	";
        return $this->db->query($sql);
    }


    public function img_min_upld($id){
        $id = (int)$id;
        // Путь для загрузки файла
       $path = ROOT.DS.'upld'.DS.'news'.DS.'img_min'.DS;



        // Создаем обькт передаем путь в конструктор, и загружаем файл по указоному пути
        $img_upl_obj = new img_upload($path);
        // Получаем полный путь и имя файла
        $path_full = $img_upl_obj->get_path_full();

        unset($img_upl_obj);
        // Обрезаем до /upld
       $path_full = stristr($path_full, "/upld");



        $sql = "
    	UPDATE `news` SET
    	`img_min`	= '".($path_full)."'
    	WHERE `id`  =  ".$id." ";

        return $this->db->query($sql);

    }
//
    public function img_content_upld($id){
        $id = (int)$id;
        // Путь для загрузки файла
        $path = '';

        // создаем обькт передаем путь в конструктор, и загружаем файл по указоному пути
        $img_upl_obj = new img_upload($path);
        // Получаем полный путь и имя файла
        $path_full = $img_upl_obj->get_path_full();

        unset($img_upl_obj);

        $sql = "
    	UPDATE `news` SET
    	`img_min`	= '".($path_full)."'
    	WHERE `id`  =  ".$id." ";

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