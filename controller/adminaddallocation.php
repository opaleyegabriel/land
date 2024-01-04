<?php
  class adminaddallocation extends Controller{
    function __construct(){
      parent::__construct();
      Session::init();
      $this->view->js=array('adminaddallocation/js/default.js');
    }
    function index(){
      //echo 'INSIDE INDEX INDEX';
      $this->view->render('adminaddallocation/index');
    }
    public function user(){
      header('location: '. URL . 'adminaddallocation');
      exit;
    }
    function searchbyphone(){
      $data=array();
      $data['phone']=$_GET['phone'];
        // echo "<pre>";
        // print_r($data);
      $this->model->searchbyphone($data);

    }
    function checkallocation(){
      $data=array();
      $data['phase']=$_POST['phase'];
      $data['block']=$_POST['block'];
      $data['plot']=$_POST['plot'];
        // echo "<pre>";
        // print_r($data);
      $this->model->checkallocation($data);

    }
    function saveallocation(){
      $data=array();
      $data['site']=$_POST['site'];
      $data['phase']=$_POST['phase'];
      $data['block']=$_POST['block'];
      $data['plot']=$_POST['plot'];
      $data['phone']=$_POST['phone'];
        // echo "<pre>";
        // print_r($data);
      $this->model->saveallocation($data);

    }

    public function logout(){
      Session::destroy();
      header('location: '. URL . 'index');
      exit;
    }
}
