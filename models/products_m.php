<?php
class Products_m extends Model {

    // Get all from table products
    public function getList(){
        // $sql = "SELECT * FROM `categories`";
         $sql = "SELECT * FROM `products`";

        // $id = (int)$id;
        return $this->db->query($sql);
    }

    public function getList_jaluzi(){
        // $sql = "SELECT * FROM `categories`";
        $sql = "SELECT * FROM `products` WHERE `parent_id` IN (2,6,10) ";

        // $id = (int)$id;
        return $this->db->query($sql);
    }

    public function getList_roleti(){
        // $sql = "SELECT * FROM `categories`";
        $sql = "SELECT * FROM `products` WHERE `parent_id` IN (14,21,26,32,31) ";

        // $id = (int)$id;
        return $this->db->query($sql);
    }

    public function getList_plisse(){
        // $sql = "SELECT * FROM `categories`";
        $sql = "SELECT * FROM `products` WHERE `parent_id` = 33 ";

        // $id = (int)$id;
        return $this->db->query($sql);
    }

    public function getList_antimos(){
        // $sql = "SELECT * FROM `categories`";
        $sql = "SELECT * FROM `products` WHERE `parent_id` = 38 ";

        // $id = (int)$id;
        return $this->db->query($sql);
    }

    public function getList_out_sys(){
        // $sql = "SELECT * FROM `categories`";
        $sql = "SELECT * FROM `products` WHERE `parent_id` = 42 ";

        // $id = (int)$id;
        return $this->db->query($sql);
    }


    public function get_Img_Prod($id){
        $id = (int)$id;
        $sql = "SELECT * FROM `img_prod` WHERE `product_id` = '{$id}'";
        return $this->db->query($sql);

    }

    public function add_gallery_image($id){
        $id = (int)$id;
        // Путь для загрузки файла
        $path = ROOT.DS.'webroot'.DS.'uploads'.DS.'images'.DS.'img_prod'.DS;
        //$path = ROOT.DS.'webroot'.DS.'uploads'.DS ;
        // Создаем обькт передаем путь в конструктор, и загружаем файл по указоному пути
        $img_upl_obj = new img_upload($path);
        // Получаем полный путь и имя файла
        $path_full = $img_upl_obj->get_path_full();

        unset($img_upl_obj);
        // Обрезаем до /webroot
        $path_full = stristr($path_full, "/webroot");
        // $path_full = stristr($path_full, "/uploads");


        $sql = "
		INSERT INTO `img_prod` SET
		`img`       = '".($path_full)."', `product_id` = '{$id}'
	";

        $this->db->query($sql);
            /*
            // Узнать последний id
            $sql = "SELECT MAX(id) FROM `img_prod`";
            $tmp_sql =$this->db->query($sql);
            $max_id = $tmp_sql[0]['MAX(id)'];

            return $max_id;
            */


    }

    // Удаление по id
    public function del_img_prod_id($id){
        $id = (int)$id;

        $sql = " SELECT `img` FROM `img_prod` WHERE `id` = '{$id}' ";
        $sql_tmp = $this->db->query($sql);
        // Указываем полный путь
        $sql_tmp = ROOT . DS . $sql_tmp[0]['img'];
        // Удаляем файл картинки
        unlink($sql_tmp);

        $sql = " DELETE FROM `img_prod` WHERE `id` = '{$id}' ";

        return $this->db->query($sql);

    }

    public function list_sub_cat($id){
        $sql = "SELECT * FROM `categories` WHERE `parent` = '{$id}' ";
        return $this->db->query($sql);
    }

    public function list_prod_sub_cat($id){
        $sql = "SELECT * FROM `products` WHERE `parent_id` = '{$id}' ";
        return $this->db->query($sql);
    }


    // Get all from table products by CategoryId
    public function  getGoodsById($id){
        $id = (int)$id;
        $sql = "select * from `products` where `id` = '{$id}' ";
        return $this->db->query($sql);
    }

    // Get by Alias from table products
    public function getByAlias($alias){
        $alias = $this->db->escape($alias);
        $sql = "select * from `products` where `alias` = '{$alias}' limit 1";

        return $this->db->query($sql);

    }

    // getCategoryByParentId
    public function  getCategoryByParentId($id){
        $id = (int)$id;
        $sql = "select * from `categories` where `parent` = '{$id}' ";
        return $this->db->query($sql);
    }


    // Get All SubCategory
    public function getAllCategorySub(){
        $sql = "select * from `categories` WHERE `id` != '1' AND `id` != '13' AND `id` != '38' AND `id` != '42' ";
        return $this->db->query($sql);
    }

    // Get all by Id from table products
    public function getById($id){
        $id = (int)$id;
        $sql = "select * from `products` where `id` = '{$id}' limit 1";
        $result = $this->db->query($sql);
        return isset($result[0]) ? $result[0] : null;
    }



    // Save to table products - Карточка товара
    public function save($data, $id = null){
        if ( !isset($data['alias']) || !isset($data['title']) || !isset($data['price_from']) || !isset($data['parent_id']) || !isset($data['content_short']) ){
            return false;
        }

        // delete 'space';
        $data = $this->db->trimAll_l($data);

        $id = (int)$id;
        $alias = $this->db->escape($data['alias']);
        $title = $this->db->escape($data['title']);
        $price_from = $this->db->escape($data['price_from']);
        $parent_id = $this->db->escape($data['parent_id']);
        $content_short = $this->db->escape($data['content_short']); // Краткое описание
        $content = $this->db->escape($data['content']); // Основное описание
        $gallery_img = $this->db->escape($data['gallery_img']); // Картинки слайдера
        $colors = $this->db->escape($data['colors']); // Цвета
        $type_id = $this->db->escape($data['type_id']); // Тип системы


        if ( !$id ){ // Add new record
            $sql = "
                insert into `products`
                   set alias = '{$alias}',
                       title = '{$title}',
                       price_from = '{$price_from}',
                       parent_id = '{$parent_id}',
                       content_short = '{$content_short}',
                       content = '{$content}',
                       gallery_img = '{$gallery_img}',
                       colors = '{$colors}',
                       type_id = '{$type_id}'
            ";
            

        } else { // Update existing record
            $sql = "
                update `products`
                   set alias = '{$alias}',
                       title = '{$title}',
                       price_from = '{$price_from}',
                       parent_id = '{$parent_id}',
                       content_short = '{$content_short}',
                       content = '{$content}',
                       gallery_img = '{$gallery_img}',
                       colors = '{$colors}',
                       type_id = '{$type_id}'


                   where `id` = {$id}
            ";
        }

        return $this->db->query($sql);
    }

    // Delete from table products
    public function delete($id){
        $id = (int)$id;
        $sql = "delete from `products` where `id` = {$id}";
        return $this->db->query($sql);
    }
	
}