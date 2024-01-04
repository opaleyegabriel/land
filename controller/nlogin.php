<?php

class Nlogin extends Controller{
    function __construct()
            {
                parent::__construct();
                Session::init();
                

        }
              function index(){                   
              	echo "hello";
                  //$this->view->render('balogin/index');

            }

   public function login()
   {
   	session::set("accountnotexist",false);
   	session::set("balogintrue",false)

   	$data=array();
   	$data['mobile']=$_POST['mobile'];
   	$data['password']=$_POST['password'];   	
   	$this->model->login($data);
   	$this->view->render('badashboard/index');
   }
}
