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
                  $this->view->alllands=$this->model->alllands();                  
                  $this->view->render('admdailyreport/index');

            }
            public function checksales($id){
                if($id==1 || $id==5 || $id==22 || $id==23 || $id==24){
                    $this->view->rekereport=$this->model->rekereport($id);
                 $this->view->render('admdailyreport/salesreport');
                }
                if($id==6 || $id==7 || $id==11 || $id==25 || $id==26){
                    $this->view->oshinreport=$this->model->oshinreport($id);
                 $this->view->render('admdailyreport/oshinreport');
                }
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
                $this->view->viewindividualreport=$this->model->viewdailyreports($id);
                $this->view->render('admdailyreport/displayinfo');
            }
            public function updatereport(){
                $data=array();
                $data['response']=$_POST['rex'];
                $data['id']=$_POST['id'];
                $data['comment2']=$_POST['comment2'];
                $this->model->updatereport($data);
                $this->view->render('admdailyreport/index');
                //echo "<pre>";
                //print_r($data);
            }
}