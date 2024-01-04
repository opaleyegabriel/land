<?php

class Admincustomerdetaillist extends Controller{
    function __construct()
            {
                parent::__construct();
                Session::init();
                

        }

        function index(){
                   $this->view->listofland=$this->model->listofland(); 
                  $this->view->render('admincustomerdetaillist/index');

            }


    }