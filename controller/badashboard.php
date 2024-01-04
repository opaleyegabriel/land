<?php

class Badashboard extends Controller{
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
            $this->view->calcpcent=$this->model->calcpcent();     
            $this->view->render('badashboard/index');
        }


        public function logout(){
          Session::destroy();
          header('location: '. URL . 'balogins');
          exit;
    }
    
}