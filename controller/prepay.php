<?php

class Prepay extends Controller{
    function __construct()
            {
                parent::__construct();
                Session::init();
                $this->view->js=array('prepay/js/default.js');
                $logged=Session::get('adminuser');
                $usertype=Session::get('adminuser');
                if ($logged==false)
                {
                    Session::destroy();
                    header('location: '. URL . 'admlogin');
                    exit;
                }   

                

       		 }
              function index(){                   
                  $this->view->render('prepay/index');

            }
            public function add(){
            	$data=array();
            	$data['amount']=$_POST['amount'];
            	$data['cname']=$_POST['cname'];
                //print_r($data);
              
            	$this->model->add($data);
            }
}
