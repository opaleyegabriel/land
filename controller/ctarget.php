<?php

class Ctarget extends Controller{
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
            $this->view->render('ctarget/index');
        }

    public function createtarget(){
        session::set("duplicate",false);
        session::set("saved",false);
        session::set("clientnotexist",false);
        session::set("BAnotexist",false);
        
        $data=array();
        $data['mobile']=$_POST['mobile'];
        $data['cmobile']=$_POST['cmobile'];
        $this->model->createtarget($data);
        $this->view->render('ctarget/index');
    }
     public function logout(){
          Session::destroy();
          header('location: '. URL . 'admlogin');
          exit;
    }
}