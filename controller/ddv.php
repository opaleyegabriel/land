<?php
class Ddv extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function index(){
        $this->view->list_ddv=$this->model->create_ddv();
        $this->view->render('ddv/index');
    }
    
    
}