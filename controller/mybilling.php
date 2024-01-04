<?php

class Mybilling extends Controller{
    function __construct()
            {
                parent::__construct();
                Session::init();
               
        }
    function index(){    
        
        
        $this->view->render('mybilling/index');
    }    
   

}
