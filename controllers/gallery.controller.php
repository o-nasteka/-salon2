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

}
