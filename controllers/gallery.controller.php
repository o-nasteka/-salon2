<?php

class GalleryController extends Controller{

    public function __construct($data = array()){
        parent::__construct($data);
        $this->model = new gallery_m();
    }

    public function index(){
       // $this->data['products'] = $this->model->getList();
    }


    public function admin_index(){
        $params = App::getRouter()->getParams();
        @$id = $params[1];

        if(isset($params[0],$params[1]) && $params[0] == 'delete') {

            $this->model->del_news_id($id);
            Router::redirect('/admin/gallery');

        }


        $this->data['gallery'] = $this->model->list_gallery();


    }
//
    public function admin_edit(){
        $params = App::getRouter()->getParams();
        $id = $params[0];
        $this->data['gallery'] = $this->model->view_id($id);
        $this->data['gallery'] = $this->data['gallery'][0];

        //print_r($this->data['gallery']);
        //exit;

        //Выгрузить картинку img_min
        if(isset($_POST['img_min_upld'])){

            if(!$this->model-> img_min_upld($id)){
                Session::setFlash('Db not update!');

            }
            Router::redirect($_SERVER['HTTP_REFERER']);
            exit;
        }


        // Выполнить update
        if(isset($_POST['submit'])){
            $this->model->edit_gallery($id);
            Router::redirect('/admin/gallery');
        }

    }




}
