<?php
class Products_m extends Model {

    // Get all from table products
    public function getList(){
        $sql = "select * from `products`";
        return $this->db->query($sql);
    }

    // Get all from table products by CategoryId
	public function  getByCategorySub($id){
        $id = (int)$id;
        $sql = "select * from `category_sub` where `category_id` = '{$id}' ";
        return $this->db->query($sql);
    }

    // Get all from table cat by CategoryId
    public function  getCatChild($id){
        $id = (int)$id;
        $sql = "select * from `cat` where `parent` = '{$id}' ";
        // $sql = "select * from `cat` ";
        return $this->db->query($sql);
    }

    // Get SubCategory title from table sub_category by Id
    public function  getSubCategoryTitleById($id){
        $id = (int)$id;
        $sql = "select `title` from `category_sub` where `id` = '{$id}' ";
        return $this->db->query($sql);
    }

    // Get Category title from table Category by Id
    public function  getCategoryTitleById($id){
        $id = (int)$id;
        $sql = "select `title` from `goods` where `id` = '{$id}' ";
        return $this->db->query($sql);
    }

    // Get Category All Cat 111
    public function AllCat($id){
        $id = (int)$id;
        $sql = "select * from `cat` where `parent` = '{$id}' ";
        return $this->db->query($sql);
    }


    // Get all products by CategorySubId from table Products
    public function  getProductsByCategoryCatId($id)
    {
        $id = (int)$id;
        $sql = "select * from `goods` where `cat_id` = '{$id}' ";
        return $this->db->query($sql);
    }

    // Get All SubCategory
    public function getAllCategorySub(){
        $sql = "select * from `category_sub` ";
        return $this->db->query($sql);
    }

    // Get all by Id from table products
    public function getById($id){
        $id = (int)$id;
        $sql = "select * from `products` where `id` = '{$id}' limit 1";
        $result = $this->db->query($sql);
        return isset($result[0]) ? $result[0] : null;
    }

    // Get by Alias from table products
    public function getByAlias($alias){
        $alias = $this->db->escape($alias);
        $sql = "select * from `products` where `alias` = '{$alias}' limit 1";
        $result = $this->db->query($sql);
        return isset($result[0]) ? $result[0] : null;
    }

    // Save to table products
    public function save($data, $id = null){
        if ( !isset($data['alias']) || !isset($data['title']) || !isset($data['content']) ){
            return false;
        }

        // delete 'space';
        $data = $this->db->trimAll_l($data);

        $id = (int)$id;
        $alias = $this->db->escape($data['alias']);
        $title = $this->db->escape($data['title']);
        $content_short = $this->db->escape($data['content_short']);
        $content = $this->db->escape($data['content']);

        if ( !$id ){ // Add new record
            $sql = "
                insert into `products`
                   set alias = '{$alias}',
                       title = '{$title}',
                       content_short = '{$content_short}',
                       content = '{$content}'

            ";
            

        } else { // Update existing record
            $sql = "
                update `products`
                   set alias = '{$alias}',
                       title = '{$title}',
                       content_short = '{$content_short}',
                       content = '{$content}'

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