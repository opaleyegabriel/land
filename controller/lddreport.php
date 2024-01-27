<?php

class Iddreport extends Controller
{
  function __construct()
  {
      parent::__construct();
      Session::init();
        
        
  }
  //https://demo.w3layouts.com/demos_new/template_demo/27-05-2019/land-demo_Free/568639772/web/register.html
  //function index(){
  //echo 'INSIDE INDEX INDEX';
    //$this->view->render('index/index');
  //}


  public function branchdailyreport(){
    $data=array();
    $data['branch']=$_POST['branch'];
    $data['datepicker']=$_POST['datepicker'];
    $this->model->branchdailyreport($data);
  }
}