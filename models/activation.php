<?php

class Activation extends Controller{
    function __construct()
            {
                parent::__construct();
                Session::init();
                

        }
              function index(){
                   $this->view->listofactivations=$this->model->listofactivations(); 
                  $this->view->render('activation/index');

            }

            public function submit(){
            	$data=array();
            	$data['fname']=$_POST['fname'];
            	$data['mobile']=$_POST['mobile'];
            	$data['client1']=$_POST['client1'];
            	$data['client2']=$_POST['client2'];
            	$data['client3']=$_POST['client3'];
            	$data['client4']=$_POST['client4'];
            	$data['client5']=$_POST['client5'];
            	$data['client6']=$_POST['client6'];
            	$data['client7']=$_POST['client7'];
            	$data['client8']=$_POST['client8'];
            	$data['client9']=$_POST['client9'];
            	$data['client10']=$_POST['client10'];
            	//echo "<pre>";
            	//print_r($data);
            	//exit();
            	session::set("saved",false);
            	$this->model->submit($data);
            }
 }