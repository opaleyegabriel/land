<?php

class Apsitevisit extends Controller{
    function __construct(){
                parent::__construct();
                Session::init();
                

        }
              function index(){
                   $this->view->listofsitevisit2approve=$this->model->listofsitevisit2approve(); 
                  $this->view->render('apsitevisit/index');

            }

            public function approvesitevisit($id){
            	$this->view->getapprovallist=$this->model->approvesitevisit($id);
            	//$this->view->render('apsitevisit/checkdetails');
            	 header('location: '. URL . 'apsitevisit/checkdetails');
            }
}