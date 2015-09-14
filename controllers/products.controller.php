<?php
class ProductsController extends Controller {

    public function __construct($data = array()){
        parent::__construct($data);
        $this->model = new Products_m();
    }
    
    public function index(){
        $this->data['products'] = $this->model->getList();
    }

    public function view(){
        if(!count($params = App::getRouter()->getParams())){
            Router::redirect('/');
        }

        if ( isset($params[0]) ){
            $alias = mb_strtolower($params[0], "UTF-8");
            $this->data['products'] = $this->model->getByAlias($alias);

            if(empty($this->data['products'])){
                Router::redirect('/');
            }

        }
    }

    // select all from category_sub
    public function view_sub(){
        if(!count($params = App::getRouter()->getParams())){
            Router::redirect('/');
        }

        if ( isset($params[0]) ){
            // $this->data['sub'] = $this->model->getByCategorySub($params[0]);
            $this->data['sub'] = $this->model->getCatChild($params[0]);

            }
       //Все id категорий и под категорий
        $array_id = array('1','13','33','37','41','3','6','10','14','21','26','31','34','35','36','38','39','40','42','43','44','45','46','47');

        //var_dump($params[0]);
        //exit;

        if(in_array($params[0],$array_id )){
            $this->data['contrl'] = 'view_sub';
        }else{
            $this->data['contrl'] = 'view';
        }
//
            // $this->data['cat'] = $this->model->getCategoryTitleById($params[0]);
            // if(empty($this->data['sub']) || empty($this->data['cat'])){
            //     Router::redirect('/');
            // }
        }


    // select products from category_sub
    public function view_sub_products(){
        if(!count($params = App::getRouter()->getParams())){
            Router::redirect('/');
        }

        if ( isset($params[0]) && is_numeric($params[0])){
            $this->data['sub_products'] = $this->model->getProductsByCategorySubId($params[0]);
            $this->data['sub'] = $this->model->getSubCategoryTitleById($params[0]);

        }else {
            Router::redirect('/');
        }
    }

    // All SubCategory calculator
    public function view_subcategory(){
        if(count($params = App::getRouter()->getParams())){
            Router::redirect('/');
        }

        $this->data['sub_all'] = $this->model->getAllCategorySub();
    }


    // Admin panel index
    public function admin_index(){
        $this->data['products'] = $this->model->getList();
    }


    public function admin_add(){
        if ( $_POST ){

            $result = $this->model->save($_POST);
            if ( $result ){
                Session::setFlash('Page was saved.');
            } else {
                Session::setFlash('Error.');
            }
            Router::redirect('/admin/products/');
        }
    }

    public function admin_edit(){

        if ( $_POST ){
            
            $id = isset($_POST['id']) ? $_POST['id'] : null;
            $result = $this->model->save($_POST, $id);
            if ( $result ){
                Session::setFlash('Page was saved.');
            } else {
                Session::setFlash('Error.');
            }
            Router::redirect('/admin/products/');
        }



        if ( isset($this->params[0]) ){
            $this->data['products'] = $this->model->getById($this->params[0]);

        } else {
            Session::setFlash('Wrong page id.');
            Router::redirect('/admin/products/');
        }
    }

    public function admin_delete(){
        if ( isset($this->params[0]) ){
            $result = $this->model->delete($this->params[0]);
            if ( $result ){
                Session::setFlash('Page was deleted.');
            } else {
                Session::setFlash('Error.');
            }
        }
        Router::redirect('/admin/products/');
    }

}


