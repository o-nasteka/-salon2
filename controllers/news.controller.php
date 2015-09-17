<?php

class NewsController extends Controller{

    public function __construct($data = array()){
        parent::__construct($data);
        $this->model = new news_m();
    }

    public function index(){
        $params = App::getRouter()->getParams();
        //Выборка новостей
        $this->data['news'] = $this->model->list_news();


    }





    public function admin_index(){
        $params = App::getRouter()->getParams();

        //Удаление отмеченных чекбоксов
        if(isset($_POST['delete'])) {

            if( $this->model-> del_news_checkbox() ){
                Session::setFlash('News by delete');
            }else{
                Session::setFlash('News not delete');
            }

            Router::redirect('/admin/news');
        }


        //Удаление одиночных по ссылке
        if(isset($params[0],$params[1]) && $params[0] == 'delete') {

           // echo '<pre>';
            //var_dump($params);
            //exit;
            $this->model->del_news_id([$params[1]]);
            Router::redirect('/admin/news');

        }

        //Выборка новостей
        $this->data['news'] = $this->model->list_news();

    }

}