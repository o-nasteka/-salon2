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




                                // ����� ���� �������� � ���� ����������� ���������
    public function admin_index(){
        $params = App::getRouter()->getParams();

        // �������� ���������� ���������
        if(isset($_POST['delete'])) {

            if( $this->model-> del_news_checkbox() ){
                Session::setFlash('News by delete');
            }else{
                Session::setFlash('News not delete');
            }

            Router::redirect('/admin/news');
        }


        // �������� ��������� �� ������
        if(isset($params[0],$params[1]) && $params[0] == 'delete') {


            $this->model->del_news_id([$params[1]]);
            Router::redirect('/admin/news');

        }

        // ������� ��������
        $this->data['news'] = $this->model->list_news();





    }




                                // ���������� �������
    public function admin_add(){

        if(isset($_POST['submit'],$_POST['title'],$_POST['content_min'],$_POST['content'])){

            if($this->model->add_news()){

            }else{

            }
            Router::redirect('/admin/news');
        }

    }



                                // �������������� �������
    public function admin_edit(){
        $params = App::getRouter()->getParams();

        $this->data['news'] = $this->model->list_news_id($params[0]);
        $this->data['news'] = $this->data['news'][0];

        if(isset($_POST['submit'],$_POST['title'],$_POST['content_min'],$_POST['content'])){

            if($this->model->edit_news($params[0])){

            }
            Router::redirect('/admin/news');
        }

    }

}