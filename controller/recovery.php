<?php

class Recovery extends Controller{
    function __construct()
        {
            parent::__construct();
                Session::init();
                 $logged=Session::get('balogintrue');
	        if ($logged==false)
	        {
	            Session::destroy();
	            header('location: '. URL . 'balogins');
	            exit;
	        }

        }
    function index(){
        $this->view->dueslist=$this->model->dueslist(); 
        $this->view->render('recovery/index');
    }
    public function details($id){
        //echo $id;
        $this->view->getdetails=$this->model->details($id);
         $this->view->render('recovery/details');
    }
        
}