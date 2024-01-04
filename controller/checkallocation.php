<?php
  class Checkallocation extends Controller{
    function __construct(){
      parent::__construct();
      Session::init();
      $this->view->js=array('checkallocation/js/default.js');
    }
    function index(){
      //echo 'INSIDE INDEX INDEX';
      $this->view->render('checkallocation/index');
    }
    public function user(){
      header('location: '. URL . 'checkallocation');
      exit;
    }
    function searchbyphone(){
      $data=array();
      $data['phone']=$_GET['phone'];
        // echo "<pre>";
        // print_r($data);
      $this->model->searchbyphone($data);

    }


    public function logout(){
      Session::destroy();
      header('location: '. URL . 'index');
      exit;
    }
}
