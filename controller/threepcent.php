<?php

class Threepcent extends Controller{
    function __construct()
            {
                parent::__construct();
                Session::init();

        $balogged=Session::get('balogintrue');
        if ($balogged==false)
        {
            Session::destroy();
            header('location: '. URL . 'balogins');
            exit;
        }

                

        }
              function index(){
                  $this->view->calcpcent1=$this->model->calcpcent1();   
                  $this->view->render('threepcent/index');

            }
}