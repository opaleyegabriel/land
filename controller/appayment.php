<?php
class Appayment extends Controller{
    function __construct()
            {
                parent::__construct();
                Session::init();
                $this->view->js=array('appayment/js/default.js');
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
        $this->view->paymentlist=$this->model->approvedlist();
        $this->view->render('appayment/index');
    }
    
    
    
}
?>