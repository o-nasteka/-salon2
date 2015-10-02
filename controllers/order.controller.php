<?php

class OrderController extends Controller{

    public function __construct($data = array()){
        parent::__construct($data);
        $this->model = new Order_m();

    }

    public function admin_index(){
        $params = App::getRouter()->getParams();

        if(@$params[0] == 'start'){
            $id_start = $params[1];
        }

        $this->data = $this->model->getList(@$id_start);

    }

    public function index(){
        if ( $_POST ){

            if ( !isset($data['name']) || !isset($data['phone']) || !isset($data['title'])){

                $this->model->sendEmail($_POST);
                $this->model->SendMsg($_POST);
                // echo "<pre>";
                // print_r($_POST);
                // exit;
            }

            // if ( $this->model->SendMsg($_POST) ){
                // Session::setFlash('Thank you! Your message was sent successfully!');
            // }


        }
    }

    // Admin edit order
    public function admin_edit(){

        if ( $_POST ){

            $id = isset($_POST['id']) ? $_POST['id'] : null;
            $result = $this->model->save($_POST, $id);
            if ( $result ){
                Session::setFlash('Page was saved.');
            } else {
                Session::setFlash('Error.');
            }
            Router::redirect('/admin/order/');
        }


        if ( isset($this->params[0]) ){
            $this->data['send'] = $this->model->getById($this->params[0]);

        } else {
            Session::setFlash('Wrong page id.');
            Router::redirect('/admin/order/');
        }
    }

    // Admin delete order
    public function admin_delete(){
        if ( isset($this->params[0]) ){
            $result = $this->model->delete($this->params[0]);
            if ( $result ){
                Session::setFlash('Page was deleted.');
            } else {
                Session::setFlash('Error.');
            }
        }
        Router::redirect('/admin/order/');
    }

}