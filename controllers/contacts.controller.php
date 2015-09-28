<?php

class ContactsController extends Controller{

    public function __construct($data = array()){
        parent::__construct($data);
        $this->model = new Message();
    }

    public function admin_index(){
        $this->data = $this->model->getList();

    }

}