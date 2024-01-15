<?php

class Imprest extends Controller{
    function __construct(){
                parent::__construct();
                Session::init();
                $this->view->js=array('imprest/js/default.js');
                $logged=Session::get('adminuser');
                $usertype=Session::get('usertype');
                if ($logged==false)
                {
                    Session::destroy();
                    header('location: '. URL . 'admlogin');
                    exit;
                }elseif ($usertype != 0) //super admin is 1 other admin is 0
                {
                    # code...
                    header('location: '. URL . 'admdashboard');

                } 

    }
    function index(){
        // $this->view->GetStaff=$this->model->GetStaff(); 
         $this->view->unretiredimprestvouchers=$this->model->unretiredimprestvouchers();
         $this->view->imprestheadid=$this->model->imprestheadid();
         $this->view->render('imprest/index');

    }
    public function new(){
    	$data=array();
    	$data['imprestheadid']=$_POST["imprestheadid"];
    	$data['description']=$_POST['description'];
    	$data['amount']=$_POST['amount'];
    	//echo "<pre>";
    	//print_r($data);
    	$this->model->new($data);
        header('location: '. URL . 'imprest');
        
    }
    public function viewtransactions($id){
        echo $id;
    }
    public function closeimprest($id){
        echo $id;
    }
}