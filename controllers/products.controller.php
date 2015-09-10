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
        $params = App::getRouter()->getParams();

        if ( isset($params[0]) ){
            $alias = mb_strtolower($params[0], "UTF-8");
            $this->data['products'] = $this->model->getByAlias($alias);

            if(empty($this->data['products'])){
                Router::redirect('/');
            }

        }
    }

    // select from category_sub
    public function view_sub(){
        $params = App::getRouter()->getParams();

        if ( isset($params[0]) ){
          
            $this->data['sub'] = $this->model->getByCategorySub($params[0]);

            
        }
    }

    // select products from category_sub
    public function view_sub_products(){
        $params = App::getRouter()->getParams();

        if ( isset($params[0]) ){

            $this->data['sub_products'] = $this->model->getByCategorySub($params[0]);


        }
    }

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


