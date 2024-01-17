<?php

class Admpwdchange extends Controller{
    function __construct()
            {
                parent::__construct();
                Session::init();
                $this->view->js=array('admpwdchange/js/default.js');
                $logged=Session::get('adminuser');
                $usertype=Session::get('usertype');
                if ($logged==false)
                {
                    Session::destroy();
                    header('location: '. URL . 'admlogin');
                    exit;
                }
                

       		 }
              function index(){                   
                  $this->view->render('admpwdchange/index');

            }

            public function pwdchange(){
                $data=array();
                $data['old']=$_POST['oldpwd'];
                $data['new']=$_POST['newpwd'];
                //check lenght min of 5
                
                $length = strlen($data['new']);
                if($length < 5){
                    echo '<script type="text/javascript">';
			            echo 'alert("Password cannot be lesser than 5 characters");
                        window.location.href = "'.URL.'admpwdchange";';
			          echo "</script>";
                      
                }
               
                //new password cannot be the same as old password
                if($data['old']==$data['new']){
                   echo '<script type="text/javascript">';
			            echo 'alert("New and old password cannot be the same");
                        window.location.href = "'.URL.'admpwdchange";';
			          echo "</script>";
                }
                
                if($data['old']!=$data['new']){
                    $this->model->pwdchange($data);
                 }
                 

            }
}