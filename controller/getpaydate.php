<?php
  class Getpaydate extends Controller{
    function __construct(){
      parent::__construct();
      Session::init();
      $this->view->js=array('getpaydate/js/default.js');
    }
    function index(){
      $this->view->render('getpaydate/index');
    }
    public function alluserpay(){
      $data=array();
          $data['mobile']=$_POST['mobile'];
          $this->view->alluserpay=$this->model->alluserpay($data);
          $this->view->render('getpaydate/viewdata');
        }
    public function user(){
      header('location: '. URL . 'getpaydate');
      exit;
    }
    public function logout(){
      Session::destroy();
      header('location: '. URL . 'index');
      exit;
    }
  }
