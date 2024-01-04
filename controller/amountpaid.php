<?php

class Amountpaid extends Controller{
    function __construct()
            {
                parent::__construct();
                Session::init();
                

        }
              function index(){
                   $this->view->transactions=$this->model->transactions(); 
                  $this->view->render('amountpaid/index');

            }
        }
   ;?>
