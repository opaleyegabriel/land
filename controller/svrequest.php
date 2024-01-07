<?php
class Svrequest extends Controller{
    function __construct()
            {
                parent::__construct();
                Session::init();
                 $this->view->js=array('sendsmsdetails/js/default.js');
                $logged=Session::get('adminuser');
                $usertype=Session::get('usertype');
                if ($logged==false)
                {
                    Session::destroy();
                    header('location: '. URL . 'admlogin');
                    exit;
                }
        }





    function index(){
       // $this->view->paymentlist=$this->model->approvedlist();
        $this->view->render('svrequest/index');
    }
    
    
    
}
?>