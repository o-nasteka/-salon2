<?php
class CatController extends Controller
{

    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->model = new Cat_m();
    }

    // Admin panel index
    public function admin_cat_index()
    {
        if (isset($_POST['sort'])) {
            @$_SESSION['sort'] = @$_POST['sort'];
        }
        if (!isset($_POST['sort']) && !isset($_SESSION['sort'])) {
            $this->data['products'] = $this->model->getList();
        } elseif ($_SESSION['sort'] == 1) {
            $this->data['products'] = $this->model->getList_jaluzi();
        } elseif ($_SESSION['sort'] == 2) {
            $this->data['products'] = $this->model->getList_roleti();
        } elseif ($_SESSION['sort'] == 3) {
            $this->data['products'] = $this->model->getList_plisse();
        } elseif ($_SESSION['sort'] == 4) {
            $this->data['products'] = $this->model->getList_antimos();
        } elseif ($_SESSION['sort'] == 5) {
            $this->data['products'] = $this->model->getList_out_sys();
        } elseif ($_SESSION['sort'] == 6) {
            $this->data['products'] = $this->model->getList();
        }

    }

}


?>