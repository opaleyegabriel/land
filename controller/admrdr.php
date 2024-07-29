<?php

class Admrdr extends Controller{
    function __construct()
            {
                parent::__construct();
                Session::init();
                $this->view->js=array('admrdr/js/default.js');
                $logged=Session::get('adminuser');
                $usertype=Session::get('usertype');
                if ($logged==false)
                {
                    Session::destroy();
                    header('location: '. URL . 'admlogin');
                    exit;
                }
            }
            
            function index(){ 
                  $this->view->allrewards=$this->model->allrewards();                  
                  $this->view->render('admrdr/index');

            }

            public function deleteduplicate($id){
                $this->model->deleteduplicate($id);
                header('location: '. URL . 'admrdr/index');
            }
}