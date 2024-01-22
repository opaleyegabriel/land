<?php

class Admdailyreport extends Controller{
    function __construct()
            {
                parent::__construct();
                Session::init();
                $this->view->js=array('admdailyreport/js/default.js');
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
              //  $this->view->dailyclientaccounthistory=$this->model->dailyclientaccounthistory();                  
                  $this->view->render('admdailyreport/index');

            }
}