<?php
class Admbawithdraws extends Controller{
    function __construct()
    {
        parent::__construct();
        Session::init();
       
    }
    function index(){    
       
        $this->view->listofwithdrawals=$this->model->listofwithdrawals(); 
        $this->view->render('admbawithdraws/index');
    }
    
                       
}
                            