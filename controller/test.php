<?php

class Test extends Controller{
    function __construct()
            {
                parent::__construct();
                Session::init();
                

        }
    function index(){
                  //echo 'INSIDE INDEX INDEX';
    $this->view->render('test/index');

    }
}