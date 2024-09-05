<?php

class Admbaw extends Controller{
    function __construct()
            {
                parent::__construct();
                Session::init();
                

        }
    function index(){
                   $this->view->sayhi=$this->model->sayhi(); 
                  $this->view->render('admbaw/index');

    }
    function approve($mobile){
        $this->model->approve($mobile);  
    }
    function reject($mobile){
        $this->model->reject($mobile);  
    }
    function paid($mobile){
        $this->model->paid($mobile);  
    }
         
         
           
 }