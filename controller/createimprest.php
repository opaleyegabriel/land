<?php

class Createimprest extends Controller{
    function __construct(){
                parent::__construct();
                Session::init();
                

    }
    function index(){
         $this->view->GetStaff=$this->model->GetStaff(); 
         $this->view->unclosedimprestvouchers=$this->model->unclosedimprestvouchers();
         $this->view->render('createimprest/index');

    }
    public function new(){
    	$data=array();
    	$data['staff']=$_POST["staff"];
    	$data['description']=$_POST['description'];
    	$data['amount']=$_POST['amount'];
    	//echo "<pre>";
    	//print_r($data);
    	$this->model->new($data);
        header('location: '. URL . 'createimprest');
        
    }
}