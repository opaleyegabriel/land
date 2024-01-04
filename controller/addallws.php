
<?php

class Addallws extends Controller{
    function __construct()
            {
                parent::__construct();
                Session::init();
                

       		 }
              function index(){                   
                  $this->view->render('addallws/index');

            }
            public function add(){
            	$data=array();
            	$data['amount']=$_POST['amount'];
            	$data['mobile']=$_POST['mobile'];
                            //print_r($data);
              
            	$this->model->add($data);
            }
}

