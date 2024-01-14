<?php

class Admdashboard extends Controller{
    function __construct()
    {
         parent::__construct();
        Session::init();
        
                $this->view->js=array('admdashboard/js/default.js');
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
            $this->view->render('admdashboard/index');
        }
    public function createaccount(){
        $data=array();
        $data['name']=$_POST['name'];
        $data['bank']=$_POST['bank'];
        $data['acctnum']=$_POST['acctnum'];
        $data['mobile']=$_POST['mobile'];
        $this->model->createaccount($data);
        $this->view->render('admdashboard/index');

    }

     public function logout(){
          Session::destroy();
          header('location: '. URL . 'admlogin');
          exit;
    }
}