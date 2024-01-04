<?php

class Clientlist extends Controller{
    function __construct()
            {
                parent::__construct();
                Session::init();
                

        }
              function index(){
                   $this->view->listofclients=$this->model->listofclients(); 
                  $this->view->render('clientlist/index');

            }
        }