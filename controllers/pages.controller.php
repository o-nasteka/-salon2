<?php

class PagesController extends Controller{

    public function __construct($data = array()){
        parent::__construct($data);
        $this->model = new Page();
    }

    public function index(){
        $this->data['pages'] = $this->model->getList();

        // Get All parent Category
        $this->data['cat'] = $this->model->getAllCategories();
        //
        // echo "<pre>";
        // print_r($this->data['cat']);
        // exit;

        /*
        foreach($this->data['cat'] as $value) {
            if($value['level'] == 1){
                $this->data['child'] = $this->model->getAllChildCategories($this->data['id']);

            } else if($value['level'] == 0){
                $this->data['products'] = $this->model->getAllProducts($this->data['id']);
            }
        }
        */

    }

    public function view(){
        $params = App::getRouter()->getParams();
        if ( isset($params[0]) ){
            $alias = mb_strtolower($params[0], "UTF-8");
            $this->data['page'] = $this->model->getByAlias($alias);
            // $this->data['cat'] = $this->model->getAllParentCategories();

            // echo "<pre>";
            // print_r($this->data['cat']);
            // exit;


            // $id = strtolower($params[0]);
            // $this->data['page'] = $this->model->getById($id);
            // $this->data['cat'] = $this->model->getAllParentCategories();
        }
    }

    // For order page
    public function order(){
        $params = App::getRouter()->getParams();

        if ( isset($params[0]) ){
            $alias = mb_strtolower($params[0], "UTF-8");
            $this->data['page'] = $this->model->getByAlias($alias);
        }
    }






    public function admin_index(){
        $this->data['pages'] = $this->model->getList();
    }

    public function admin_add(){
        if ( $_POST ){
            $result = $this->model->save($_POST);
            if ( $result ){
                Session::setFlash('Page was saved.');
            } else {
                Session::setFlash('Error.');
            }
            Router::redirect('/admin/pages/');
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
            Router::redirect('/admin/pages/');
        }

        if ( isset($this->params[0]) ){
            $this->data['page'] = $this->model->getById($this->params[0]);
        } else {
            Session::setFlash('Wrong page id.');
            Router::redirect('/admin/pages/');
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
        Router::redirect('/admin/pages/');
    }

}