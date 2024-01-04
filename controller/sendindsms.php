<?php

class Sendindsms extends Controller{
    function __construct()
            {
                parent::__construct();
                Session::init();               

        }
    

    function index(){
           // $this->view->dateofcontractactivation=$this->model->dateofcontractactivation();           
          //  $this->view->allmyproducts=$this->model->all_ind_products(); 
                       
        $this->view->render('sendindsms/index');
    }

    public function details(){
        Session::set('smobile', $_POST['mobile']);
        header('location: '. URL . 'sendsmsdetails');
    }

           
 }