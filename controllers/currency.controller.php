<?php
class CurrencyController extends Controller{

    public function __construct($data = array()){
        parent::__construct($data);
        $this->model = new Currency_m();
    }




}