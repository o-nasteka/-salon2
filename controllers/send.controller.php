<?php

class SendController extends Controller{

    public function __construct($data = array()){
        parent::__construct($data);
        $this->model = new Send_m();

    }

    public function admin_index(){
        $this->data = $this->model->getList();

    }

    public function index(){
        if ( $_POST ){
            if ( $this->model->SendMsg($_POST) ){
                Session::setFlash('Thank you! Your message was sent successfully!');
                $this->model->sendEmail();
            }
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
            Router::redirect('/admin/send/');
        }


        if ( isset($this->params[0]) ){
            $this->data['send'] = $this->model->getById($this->params[0]);

        } else {
            Session::setFlash('Wrong page id.');
            Router::redirect('/admin/send/');
        }
    }

    // Admin delete messages
    public function admin_delete(){
        if ( isset($this->params[0]) ){
            $result = $this->model->delete($this->params[0]);
            if ( $result ){
                Session::setFlash('Page was deleted.');
            } else {
                Session::setFlash('Error.');
            }
        }
        Router::redirect('/admin/send/');
    }

}