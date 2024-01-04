
<?php

class Addallw extends Controller{
    function __construct()
            {
                parent::__construct();
                Session::init();
                

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

