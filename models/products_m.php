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

        return $result = $this->db->query($sql);

    }

    // getCategoryByParentId
    public function  getCategoryByParentId($id){
        $id = (int)$id;
        $sql = "select * from `categories` where `parent` = '{$id}' ";
        return $this->db->query($sql);
    }


    // Get All SubCategory
    public function getAllCategorySub(){
        $sql = "select * from `categories` ";
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
        if ( !isset($data['alias']) || !isset($data['title']) || !isset($data['content']) ){
            return false;
        }

        // delete 'space';
        $data = $this->db->trimAll_l($data);

        $id = (int)$id;
        $alias = $this->db->escape($data['alias']);
        $title = $this->db->escape($data['title']);
        $content_short = $this->db->escape($data['content_short']); // Краткое описание
        $content = $this->db->escape($data['content']); // Основное описание
        $gallery_img = $this->db->escape($data['gallery_img']); // Картинки слайдера
        $params = $this->db->escape($data['params']); // Характеристики
        $colors = $this->db->escape($data['colors']); // Цвета
        $type_id = $this->db->escape($data['type_id']); // Тип системы


        if ( !$id ){ // Add new record
            $sql = "
                insert into `products`
                   set alias = '{$alias}',
                       title = '{$title}',
                       content_short = '{$content_short}',
                       content = '{$content}',
                       gallery_img = '{$gallery_img}',
                       params = '{$params}',
                       colors = '{$colors}',
                       type_id = '{$type_id}'


            ";
            

        } else { // Update existing record
            $sql = "
                update `products`
                   set alias = '{$alias}',
                       title = '{$title}',
                       content_short = '{$content_short}',
                       content = '{$content}',
                       gallery_img = '{$gallery_img}',
                       params = '{$params}',
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