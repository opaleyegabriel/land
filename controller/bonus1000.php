<?php

class Bonus1000 extends Controller{
    function __construct()
    {
         parent::__construct();
        Session::init();
        $logged=Session::get('useradm');
        if ($logged==false)
        {
            Session::destroy();
            header('location: '. URL . 'admlogin');
            exit;
        }     


      }
    function index(){           
      $this->view->render('bonus1000/index');
    }

    public function chargeonsales(){
        session::set("duplicate",false);
        session::set("saved",false);
        session::set("clientnotexist",false);
        session::set("BAnotexist",false);
        
        $data=array();
        $data['mobile']=$_POST['acctno'];
        $data['cmobile']=$_POST['cmobile'];
        $this->model->chargeonsales($data);
        $this->view->render('bonus1000/index');
    }

     public function logout(){
          Session::destroy();
          header('location: '. URL . 'admlogin');
          exit;
    }
}