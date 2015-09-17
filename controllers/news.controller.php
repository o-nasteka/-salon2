<?php

class NewsController extends Controller{

    public function __construct($data = array()){
        parent::__construct($data);
        $this->model = new news_m();
    }

    public function index(){
        //������� ��������
        $this->data['news'] = $this->model->list_news();


    }

    public function admin_index(){
        $params = App::getRouter()->getParams();

        //�������� ���������� ���������
        if(isset($_POST['delete'])) {
            $this->model-> del_news_checkbox();
        }

        //�������� ��������� �� ������
        if(isset($_GET['key1'],$_GET['key2']) && $_GET['key1'] == 'delete') {

            Session::setFlash('News by delete');

            //header("Location: /admin/news");
            //exit();
        }

        //������� ��������
        $this->data['news'] = $this->model->list_news();

    }

}