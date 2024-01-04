<?php
class Samp extends Controller{
    function __construct()
            {
                parent::__construct();
                Session::init();
                
                
        }
    function index(){
        //$this->view->allmyproducts=$this->model->allmyproducts();  
                  
        $this->view->render('samp/index');
    }
   
                     
}
                            