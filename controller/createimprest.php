<?php

class Createimprest extends Controller{
    function __construct(){
                parent::__construct();
                Session::init();
                

    }
    function index(){
         $this->view->GetStaff=$this->model->GetStaff(); 
         $this->view->render('createimprest/index');

    }
}