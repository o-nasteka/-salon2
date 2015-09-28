<?php

class SendController extends Controller{

    public function __construct($data = array()){
        parent::__construct($data);
        $this->model = new Send();
    }

    public function admin_index(){
        $this->data = $this->model->getList();

    }

    public function index(){
        if ( $_POST ){
            if ( $this->model->SendMsg($_POST) ){
                Session::setFlash('Thank you! Your message was sent successfully!');
            }
        }
    }

}