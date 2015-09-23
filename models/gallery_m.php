<?php
class gallery_m extends Model{
//

    public function list_gallery()
    {

        $sql = "SELECT * FROM `gallery`";


        return $this->db->query($sql);
    }

    // Выборка по id
    public function view_id($id){
        $id = (int)$id;
        $sql = " SELECT * FROM `gallery` WHERE `id` = '{$id}' LIMIT 1 ";

        return $this->db->query($sql);
    }

    // Редактирование эллемента галереи
    public function edit_gallery($id){

        $id = (int)$id;

        // Удаляет пробелы справа и слева, и применяет mysqli_escape_string к массиву POST
        foreach($_POST as $k=>$v) {
            $_POST[$k] = $this->db->escape(trim($v));
        }

        $sql = "
		UPDATE `gallery` SET
		`title`       = '".($_POST['title'])."'
		WHERE `id` = ".$id."
	";
        return $this->db->query($sql);
    }

    // Добавление отдельно картинки (создание новой картинки в галереи)
    public function add_gallery_image(){

        // Путь для загрузки файла
        $path = ROOT.DS.'upld'.DS.'images'.DS.'our'.DS;

        // Создаем обькт передаем путь в конструктор, и загружаем файл по указоному пути
        $img_upl_obj = new img_upload($path);
        // Получаем полный путь и имя файла
        $path_full = $img_upl_obj->get_path_full();

        unset($img_upl_obj);
        // Обрезаем до /upld
        $path_full = stristr($path_full, "/upld");


        $sql = "
		INSERT INTO `gallery` SET
		`img`       = '".($path_full)."'
	";

        if($this->db->query($sql)){
            // Узнать последний id
            $sql = "SELECT MAX(id) FROM `gallery`";
            $tmp_sql =$this->db->query($sql);
            $max_id = $tmp_sql[0]['MAX(id)'];

            return $max_id;
        }


    }

    // Добавление нового эллемента галереи
    public function add_gallery(){
        // Удаляет пробелы справа и слева, и применяет mysqli_escape_string
        foreach($_POST as $k=>$v) {
            $_POST[$k] = $this->db->escape(trim($v));
        }


        $sql = "
		INSERT INTO `gallery` SET
		`title`       = '".($_POST['title'])."'
	";

        return $this->db->query($sql);
    }



}

