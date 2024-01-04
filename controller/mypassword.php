<?php

class Mypassword extends Controller{
    function __construct()
    {
        parent::__construct();
     	  Session::init();
      	$this->view->js=array('mypassword/js/default.js');  
                

    }
              function index(){                  
                  $this->view->render('mypassword/index');

            }

            public function getmypassword(){
            	$data=array();
            	$data['mobile']=$_POST['mobile'];
            	$this->model->getmypassword($data);
            }
}