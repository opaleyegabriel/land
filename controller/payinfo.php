<?php

class Payinfo extends Controller{
    function __construct()
            {
                parent::__construct();
                Session::init();
                  Session::init();
                 $logged=Session::get('balogintrue');
            if ($logged==false)
            {
                Session::destroy();
                header('location: '. URL . 'balogins');
                exit;
            }
                

        }
              function index(){
                   
                  $this->view->render('payinfo/index');

            }
            public function search(){
                $data=array();
            	$data['mobile']=$_POST['mobile'];
            	$this->view->ff=$this->model->searchFunction($data);
                $this->view->render('payinfo/myinfo');
            }
}