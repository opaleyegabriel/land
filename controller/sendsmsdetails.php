<?php

class Sendsmsdetails extends Controller{
    function __construct()
            {
                parent::__construct();
                Session::init();               

        }
    

    function index(){
            $this->view->dateofcontractactivation=$this->model->dateofcontractactivation();           
            $this->view->allmyproducts=$this->model->all_ind_products(); 
            $this->view->getnoOfworkingDays=$this->model->getnoOfworkingDays(); 
            
                       
        $this->view->render('sendsmsdetails/index');
    }
    public function sendmsg0(){
        $data=array();
        $data['mobile']=session::get('smobile');
        $data['message']=$_POST['message'];
        $data['messageNew']=$_POST['messageNew'];
        $data['messageMonth']=$_POST['messageMonth'];
        //print_r($data);
        $this->model->sendmsg0($data);

    }
     public function sendmsg1(){
        $data=array();
        $data['mobile']=session::get('smobile');
        $data['message']=$_POST['message'];
        $data['messageNew']=$_POST['messageNew'];
        $data['messageMonth']=$_POST['messageMonth'];
        //print_r($data);
        $this->model->sendmsg1($data);

    }
     public function sendmsg2(){
        $data=array();
        $data['mobile']=session::get('smobile');
        $data['message']=$_POST['message'];
        $data['messageNew']=$_POST['messageNew'];
        $data['messageMonth']=$_POST['messageMonth'];
        //print_r($data);
        $this->model->sendmsg2($data);

    }

           
 }