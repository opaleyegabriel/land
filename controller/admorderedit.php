<?php

class Admorderedit extends Controller{
    function __construct()
        {
            parent::__construct();
            Session::init();
            
                    $this->view->js=array('admorderedit/js/default.js');
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
                  //echo 'INSIDE INDEX INDEX';
        $this->view->render('admorderedit/index');

    }
    public function SearchOrder(){
        $data=array();
        $data['mobile']=$_POST['clientmobile'];
        $this->model->SearchOrder($data);
    }
}