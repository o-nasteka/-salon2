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
            //Если выборка из базы фолс то редирект
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


        $data1 = $this->model->getByCategorySub(0);
        $data2 = $this->model->getList();
        foreach($data2 as $dat_id){
            $id2[] = $dat_id['id'];
        }

        foreach($data1 as $dat1){
            $id[] = $dat1['id'];
            foreach($data2 as $dat2){
                if($dat1['id'] == $dat2['parent']){
                    $res[] = $dat2['id'];
                }
            }
        }
        $res = array_merge($id, $res);

        $array_id = array_diff($id2,$res);


        if(!count($params = App::getRouter()->getParams())){
            Router::redirect('/');
        }

        if ( isset($params[0]) ) {
            $this->data['id'] = $this->model->getCatChild($params[0]);
             foreach($this->data['id'] as $sub_id ){

                    if(in_array($sub_id['id'],$array_id)){
                        $this->data['contrl'] = 'view';

                    }else{

                        $this->data['contrl'] = 'view_sub';
                    }

                }
            unset($this->data['id']);
        }


            if($this->data['contrl'] == 'view'){
                $this->data['sub']=$this->model->getByAlias($params[0]);
            }else{
                $this->data['sub'] = $this->model->getCatChild($params[0]);
            }


            // echo '<pre>';
            //echo $this->data['contrl'];
            //print_r($this->data['sub']);
             //exit;

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

    // All Sub 111
    public function view_sub1(){
        if(count($params = App::getRouter()->getParams())){
            Router::redirect('/');
        }

        if ( isset($params[0]) ) {
            $this->data['cat'] = $this->model->AllCat($params[0]);
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


