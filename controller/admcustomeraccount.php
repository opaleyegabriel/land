<?php
class Admcustomeraccount extends Controller{
    function __construct()
            {
                parent::__construct();
                Session::init();
                $this->view->js=array('admcustomeraccount/js/default.js');
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
            $this->view->listofclients=$this->model->listofclients();
            $this->view->render('admcustomeraccount/index');
        }

        public function manage($phone){
            $this->view->personalorders=$this->model->personalorders($phone);
            $this->view->render('admcustomeraccount/manage'); 
        }


    }

