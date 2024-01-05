<?php

class Sendindsms extends Controller{
    function __construct()
            {
                parent::__construct();
                Session::init();  
                $this->view->js=array('sendindsms/js/default.js');
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
           // $this->view->dateofcontractactivation=$this->model->dateofcontractactivation();           
          //  $this->view->allmyproducts=$this->model->all_ind_products(); 
                       
        $this->view->render('sendindsms/index');
    }

    public function details(){
        Session::set('smobile', $_POST['mobile']);
        header('location: '. URL . 'sendsmsdetails');
    }

           
 }