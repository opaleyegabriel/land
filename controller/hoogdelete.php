<?php

class Hoogdelete extends Controller{
    function __construct()
            {
               parent::__construct();
               Session::init();
        		$this->view->js=array('hoogdelete/js/default.js');        		
                $logged=Session::get('superuser');
                if (empty($logged))
                {
                    Session::destroy();
                    header('location: '. URL . 'payslogin');
                    exit;
                }

     }
    function index(){
    	$this->view->getpayments=$this->model->getpayments();
        $this->view->render('hoogdelete/index');
    }
    public function delete()
    {
        $data=array();
        $data['orderno']=$_POST['orderno'];
        $this->model->delete($data);
    }
    

}