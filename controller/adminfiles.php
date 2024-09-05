<?php

class Adminfiles extends Controller{
    function __construct()
            {
                parent::__construct();
                Session::init();
                

        }
    function index(){
                   //$this->view->deleteunapprovedpaymentrequest=$this->model->deleteunapprovedpaymentrequest(); 
                  $this->view->render('adminfiles/index');

    }
    public function deleterecord(){
        $this->model->deleteunapprovedpaymentrequest();  
       
    }

           
 }