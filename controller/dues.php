<?php

class Dues extends Controller{
    function __construct()
    {
         parent::__construct();
        Session::init();
        $this->view->js=array('dues/js/default.js');                
        $logged=Session::get('superuser');
        if (empty($logged))
        {
            Session::destroy();
            header('location: '. URL . 'payslogin');
            exit;
        }

      }
    function index(){           
      $this->view->render('dues/index');
    }

    public function makeduesrecord(){
       
       //echo "hi";
        $this->model->makeduesrecord();       
    
    }
    public function calc3pcent(){
        $this->model->calc3pcent();   
    }
    public function sms(){        
        $this->model->sms();   
    }




}