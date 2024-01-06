<?php

class Prepay extends Controller{
    function __construct()
            {
                parent::__construct();
                Session::init();
                $this->view->js=array('prepay/js/default.js');
                $logged=Session::get('adminuser');
                $usertype=Session::get('usertype');
                if ($logged==false)
                {
                    Session::destroy();
                    header('location: '. URL . 'admlogin');
                    exit;
                }elseif ($usertype != 1) //super admin is 1 other admin is 0
                {
                    # code...
                    header('location: '. URL . 'admdashboard');

                } 
                
                

       		 }
              function index(){     
                $this->view->paymentlist=$this->model->unapprovedlist();              
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
