<?php

class Userdetails extends Controller{
    function __construct()
       {
                parent::__construct();
                Session::init();  
                $this->view->js=array('userdetails/js/default.js');             

        }
     function index(){
               //$this->view->listofactivations=$this->model->listofactivations(); 
                  $this->view->render('userdetails/index');

            }



    public function searchme(){
    	$data=array();
    	$data['reamil']=$_POST['reamil'];
    	$this->model->searchme($data);
    }
}