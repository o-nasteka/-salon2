<?php

class GalleryController extends Controller{

    public function __construct($data = array()){
        parent::__construct($data);
        $this->model = new gallery_m();
    }

    public function index(){
       // $this->data['products'] = $this->model->getList();
    }
}
