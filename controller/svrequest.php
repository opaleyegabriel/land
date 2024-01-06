<?php
class Svrequest extends Controller{
    function __construct()
            {
                parent::__construct();
                Session::init();
        }





    function index(){
       // $this->view->paymentlist=$this->model->approvedlist();
        $this->view->render('svrequest/index');
    }
    
    
    
}
?>