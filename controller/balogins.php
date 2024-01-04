<?php

class Balogins extends Controller{
    function __construct()
            {
                parent::__construct();
                Session::init();
               
        

        }
              function index(){                   
              	
                  $this->view->render('balogins/index');

            }

   public function login_bas()
   {
   	session::set("accountnotexist",false);
   	session::set("balogintrue",false);   	
   	$data=array();
   	$data['mobile']=$_POST['mobile'];
   	$data['password']=$_POST['password'];   	
   	$this->model->login_bas($data);
   	$this->view->render('badashboard/index');
   }
   
}
