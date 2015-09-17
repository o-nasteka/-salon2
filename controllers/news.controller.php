<?php

class NewsController extends Controller{

    public function __construct($data = array()){
        parent::__construct($data);
        $this->model = new news();
    }

    public function index(){
        $params = App::getRouter()->getParams();

        //Удаление отмеченных чекбоксов
        if(isset($_POST['delete'])) {
            $this->model-> del_news_checkbox();
        }



        //Удаление одиночных по ссылке
        if(isset($_GET['key1'],$_GET['key2']) && $_GET['key1'] == 'delete') {

            q("
		DELETE FROM `news`
		WHERE `id` = ".(int)$_GET['key2']."
	");

            $_SESSION['info'] = 'Новость была удалена';
            header("Location: /news");
            exit();
        }
//Удаление одиночных по ссылке - конец




        if ( $_POST ){
            if ( $this->model->save($_POST) ){

                Session::setFlash('Thank you! Your message was sent successfully!');
            }
        }


        $news = q("
	SELECT *
	FROM `news`
	ORDER BY `id` DESC
");




    }

    public function admin_index(){
        $this->data = $this->model->getList();

    }

}