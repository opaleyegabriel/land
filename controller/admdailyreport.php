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

            public function display(){
                $data=array();
                $data['branch']=$_POST['branch'];
                $data['datepicker']=$_POST['datepicker'];
                //echo "<pre>";
                //print_r($data);
                
                $this->view->displayrecord=$this->model->display($data);
                $this->view->render('admdailyreport/display');
            }
            public function displayinfor($id){
                echo $id;
            }
}