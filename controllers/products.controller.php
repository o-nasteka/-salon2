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
       //Если нет параметра то редирект
        if(!count($params = App::getRouter()->getParams())){
            Router::redirect('/');
        }
        //Выборка по alias
        //Если есть параметр и если он не число то true иначе смотрим else
        if ( isset($params[0]) && !is_numeric($params[0]) ){

            $alias = mb_strtolower($params[0], "UTF-8");
            $this->data['products'] = $this->model->getByAlias($alias);

            if(isset($this->data['products'][0])){
                foreach($this->data['products'] as $data){
                }
                $this->data['products'] = $data;
            }

            //Если выборка из базы false то редирект
            if(empty($this->data['products'])){
                Router::redirect('/');
            }


        }else {
            //Выборка по id
            $this->data['products'] = $this->model->getGoodsById($params[0]);
            //Если выборка из базы многомерный массив то true/
            if(isset($this->data['products'][0])){
                foreach($this->data['products'] as $data){
                }
                $this->data['products'] = $data;
            }
        }


    }

    // select all from category_sub
    public function view_sub(){

        if(!count($params = App::getRouter()->getParams())){
            Router::redirect('/');
        }


        $this->data['sub'] = $this->model-> list_sub_cat($params[0]);

        if(count($this->data['sub'])){

            $this->data['contrl'] = 'view_sub';
        }else{

            $this->data['contrl'] = 'view';
            $this->data['sub'] = $this->model->list_prod_sub_cat($params[0]);
        }
       // echo '<pre>';
       //print_r($this->data['sub']);
        //exit;//

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
        if(!isset($_POST['sort'])) {
            $this->data['products'] = $this->model->getList();
        }elseif($_POST['sort'] == 1){
            $this->data['products'] = $this->model->getList_jaluzi();
        }elseif($_POST['sort'] == 2){
            $this->data['products'] = $this->model->getList_roleti();
        }elseif($_POST['sort'] == 3){
            $this->data['products'] = $this->model->getList_plisse();
        }elseif($_POST['sort'] == 4){
            $this->data['products'] = $this->model->getList_antimos();
        }elseif($_POST['sort'] == 5){
            $this->data['products'] = $this->model->getList_out_sys();
        }elseif($_POST['sort'] == 6){
            $this->data['products'] = $this->model->getList();
        }



    }


    // Admin add product
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

    // Admin edit product
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

    // Admin delete product
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


