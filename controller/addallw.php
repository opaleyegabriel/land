
<?php

class Addallw extends Controller{
    function __construct()
            {
                parent::__construct();
                Session::init();
                $this->view->js=array('addallw/js/default.js');
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
                  $this->view->render('addallw/index');

            }
            public function add(){
            	$data=array();
            	$data['amount']=$_POST['amount'];
            	$data['mobile']=$_POST['mobile'];
              //print_r($data);
              //exit();
            	$this->model->add($data);
            }
}

