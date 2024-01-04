<?php

class Bachangepwd extends Controller{
    function __construct()
            {
                parent::__construct();
                Session::init();
                

        }
              function index(){
                  
                  $this->view->render('Bachangepwd/index');

            }
}