<?php

class NewsController extends Controller{

    public function __construct($data = array()){
        parent::__construct($data);
        $this->model = new news_m();
    }

    public function index(){
        $params = App::getRouter()->getParams();
        //������� ��������
        $this->data['news'] = $this->model->list_news();


    }

    public function admin_index(){
        $params = App::getRouter()->getParams();

        //�������� ���������� ���������
        if(isset($_POST['delete'])) {

            if( $this->model-> del_news_checkbox() ){
                Session::setFlash('News by delete');
            }else{
                Session::setFlash('News not delete');
            }

        }

        //�������� ��������� �� ������
        if(isset($params[0],$params[1]) && $params[0] == 'delete') {


           if( $this->model->del_news_id([$params[1]]) ){
               Session::setFlash('News by delete');
           }else{
               Session::setFlash('News not delete');
           }

            //header("Location: /admin/news"); //
            //exit();
        }

        //������� ��������
        $this->data['news'] = $this->model->list_news();

    }

}